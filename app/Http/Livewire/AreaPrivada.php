<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\FlowerShop;
use App\Models\ProductShop;
use App\Models\Category;
use App\Models\Discounts;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\WithPagination;

class AreaPrivada extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $shops, $selectedShop, $products, $selectedShopDirecto, $productToCreate = false, $categories = [], $categories_checked = [], $selectedCategory = '';
    public $num_asociado, $shop_title, $shop_contact_name,$shop_product_name, $shop_img_product, $shop_logo, $shop_direction_maps, $shop_img_principal, $shop_direction, $shop_email, $shop_phone, $shop_description, $shop_province, $shop_city, $shop_url, $shop_product_url, $shop_code, $shop_whatsap_phone, $is_direct_florist;
    public $shops_admin = false, $products_admin = false, $discounts_admin = false, $inputsToCreateShop = false, $inputsToCreateCategory =false, $inputsToCreateDiscount = false, $selectedShopAdmin, $confirmDelete, $confirmDeleteCat, $selectedCatAdmin, $name_new_category, $confirmDeleteDiscount, $editDiscountAdmin; //admin
    public $name_discount, $description_discount, $contact_discount, $logo_discount;

    public function render()
    {
        if($this->selectedShopDirecto){
            $shop = FlowerShop::find($this->selectedShopDirecto['id']);
            $this->products = ProductShop::where('shop_id',$shop->id)->get();
            if($this->selectedCategory != ''){
                foreach($this->products as $key=>$prod){
                    if(!in_array($this->selectedCategory, $prod->category)){
                        unset($this->products[$key]);
                    }
                }
            }
        }
        if($this->selectedShopAdmin && $this->shop_logo == null && $this->shop_img_principal == null){
            $shop = FlowerShop::find($this->selectedShopAdmin['id']);
            $this->shop_title = $shop->title;
            $this->shop_contact_name = $shop->contact_name;
            $this->shop_url = $shop->url_web;
            $this->shop_phone = $shop->phone_number;
            $this->shop_whatsap_phone = $shop->whatsapp_number;
            $this->shop_logo = $shop->logo;
            $this->num_asociado = $shop->user_asociado;
            $this->shop_img_principal = $shop->img_principal;
            $this->shop_direction = $shop->direction;
            $this->shop_province = $shop->province;
            $this->shop_code = $shop->postal_code;
            $this->shop_email = $shop->email;
            $this->shop_city = $shop->city;
            $this->shop_description = $shop->description;
        }
        if($this->selectedCatAdmin){
            $category = Category::find($this->selectedCatAdmin['id']);
            $this->edit_cat_name = $category->name;
        }
        //dd($this->discounts);
        if($this->discounts_admin && $this->logo_discount == null){
            if($this->editDiscountAdmin != null){
                $discount = Discounts::find($this->editDiscountAdmin);
                if($discount){
                    $this->name_discount = $discount->name;
                    $this->logo_discount = $discount->logo;
                    $this->description_discount = $discount->description;
                    $this->contact_discount = $discount->contact;
                }
            }
        }
        $this->shops = Auth::User()->shops;
        return view('livewire.area-privada', [
            'discounts'=>Discounts::paginate(1),
            'ctgries'=>Category::paginate(1),
            'shopsAdmin'=>FlowerShop::paginate(1),
        ]);
    }
    public function updateShopAdmin($id){
        if($this->shop_img_principal){
            $routePrincipal = $this->shop_img_principal->storeAs('public/shop-'.$id, $this->shop_img_principal->getClientOriginalName());
        }else{
            $routePrincipal = NULL;
        }
        if($this->shop_logo){
            //COMPROVAR Q NO ES REPETEIXIN ELS NOMS, SI EXISTEIX EL NOM LI AFEGIM -1 O -2
            $routeLogo = $this->shop_logo->storeAs('public/shop-'.$id, $this->shop_logo->getClientOriginalName());
        }else{
            $routeLogo = NULL;
        }
        $shop = FlowerShop::find($id)->update([
            'title'=>$this->shop_title,
            'contact_name'=>$this->shop_contact_name,
            'email'=>$this->shop_email,
            'logo'=>$routeLogo,
            'img_principal'=>$routePrincipal,
            'phone_number'=>$this->shop_phone,
            'whatsapp_number'=>$this->shop_whatsap_phone,
            'city'=>$this->shop_city,
            'province'=>$this->shop_province,
            'direction'=>$this->shop_direction,
            'postal_code'=>$this->shop_code
        ]);
        $this->dispatchBrowserEvent('success', ['success'=>'Entidad actualizada con éxito']);
        $this->selectedShopAdmin = null;
    }
    public function createShop(){
        if($this->is_direct_florist){
            $directFlorist = true;
        }else{
            $directFlorist = false;
        }
        $shop = FlowerShop::create([
            'title'=>$this->shop_title,
            'contact_name'=>$this->shop_contact_name,
            'email'=>$this->shop_email,
            'phone_number'=>$this->shop_phone,
            'user_asociado'=>$this->num_asociado,
            'whatsapp_number'=>$this->shop_whatsap_phone,
            'url_web'=>$this->shop_url,
            'city'=>$this->shop_city,
            'province'=>$this->shop_province,
            'direction'=>$this->shop_direction,
            'postal_code'=>$this->shop_code,
            'is_direct_florist'=>$directFlorist,
        ]);
        if($this->shop_img_principal){
            $routePrincipal = $this->shop_img_principal->storeAs('public/shop-'.$shop->id, $this->shop_img_principal->getClientOriginalName());
        }else{
            $routePrincipal = NULL;
        }
        if($this->shop_logo){
            //COMPROVAR Q NO ES REPETEIXIN ELS NOMS, SI EXISTEIX EL NOM LI AFEGIM -1 O -2
            $routeLogo = $this->shop_logo->storeAs('public/shop-'.$shop->id, $this->shop_logo->getClientOriginalName());
        }else{
            $routeLogo = NULL;
        }
        $shop->update([
            'logo'=>$routeLogo,
            'img_principal'=>$routePrincipal,
        ]);
        $this->dispatchBrowserEvent('success', ['success'=>'Entidad creada con éxito']);
        $this->inputsToCreateShop = false;
    }
    public function saveInfo(){
        $shop = FlowerShop::find($this->selectedShop['id'])->update([
            'title'=>$this->shop_title,
            'contact_name'=>$this->shop_contact_name,
            'email'=>$this->shop_email,
            'phone_number'=>$this->shop_phone,
            'city'=>$this->shop_city,
            'province'=>$this->shop_province,
            'direction'=>$this->shop_direction,
            'postal_code'=>$this->shop_code
        ]);
        $this->selectedShop = null;
    }
    public function saveNewProduct(){
        $cats = [];
        $this->validate([
            'shop_product_name'=>'required|min:3',
            'shop_img_product'=>'required|file',
            'shop_product_url'=>'required'
        ]);
        $shop = FlowerShop::find($this->selectedShopDirecto['id']);
        foreach($this->categories_checked as $checked){
            array_push($cats, $checked);
        }
        //$cats = json_encode($cats, true);
        $ok = ProductShop::create([
            'title'=>$this->shop_product_name,
            'product_img'=>$this->shop_img_product,
            'product_url'=>$this->shop_product_url,
            'shop_id'=>$shop->id,
            'category'=>$cats,
            'postal_code'=>$shop->postal_code,
            'province'=>$shop->province,
            'city'=>$shop->city,
            'direction'=>$shop->direction
        ]);
        if($ok){
            $this->dispatchBrowserEvent('success', ['success'=>'Producto Creado Correctamente']);
        }else{
            dd('fail');
        }
        $this->cleanInputs();
    }
    public function cleanInputs(){
        $this->shop_product_name = null;
        $this->shop_img_product = null;
        $this->categories_checked = null;
        $this->shop_product_url = null;
    }
    public function changeSection($section){
        if($section == 'entidades'){
            $this->shops_admin = true;
            $this->products_admin = false;
            $this->discounts_admin = false;
        }elseif($section == 'productos'){
            $this->products_admin = true;
            $this->shops_admin = false;
            $this->discounts_admin = false;
        }elseif($section == 'descuentos'){
            $this->discounts_admin = true;
            $this->products_admin = false;
            $this->shops_admin = false;
        }
    }
    public function deleteShop($id){
        $shop = FlowerShop::find($id);
        if($shop)$shop[0]->delete();
        $this->dispatchBrowserEvent('success', ['success'=>'Entidad eliminada correctamente']);
    }
    public function deleteCat($id){

        $prods = ProductShop::where('category', 'like', '%'.'"$id"'.'%')->get();
        if(count($prods)>0){
            $this->dispatchBrowserEvent('error', ['error'=>'Existen productos con esa categoria']);
        }else{
            $cat = Category::find($id);
            if($cat) $cat->delete();
            $this->dispatchBrowserEvent('success', ['success'=>'Categoria eliminada correctamente']);
        }
    }
    public function updateCategoryAdmin($id){
        $cat = Category::find($id);
        if($cat){
            $cat->name = $this->edit_cat_name;
            $cat->update();
            $this->dispatchBrowserEvent('success', ['success'=>'Categoria actualizada con éxito']);
            $this->selectedCatAdmin = null;
        }else{
            dd('fail');
        }
    }
    public function createCategoryAdmin(){
        $names = [];
        foreach($this->categories as $cat){
            array_push($names, $cat->name);
        }
        if(!in_array($this->name_new_category, $names)){
            Category::create([
                'name'=>$this->name_new_category
            ]);
            $this->name_new_category = null;
            $this->dispatchBrowserEvent('success', ['success'=>'Categoria creada con éxito']);
        }else{
            $this->dispatchBrowserEvent('error', ['error'=>'Ésta categoria ya existe']);
        }
    }
    public function updateDiscount($id){
        $disc = Discounts::find($id);
        $disc->name = $this->name_discount;
        $disc->description = $this->description_discount;
        $disc->contact = $this->contact_discount;
        if($this->logo_discount){
            $routePrincipal = $this->logo_discount->storeAs('public/discount-'.$id, $this->logo_discount->getClientOriginalName());
        }else{
            $routePrincipal = NULL;
        }
        $disc->logo = $this->logo_discount;
        $disc->update();
        $this->editDiscountAdmin = null;
        $this->name_discount = null;
        $this->logo_discount = null;
        $this->contact =null;
        $this->dispatchBrowserEvent('success', ['success'=>'Descuento actualizado con éxito']);
    }
    public function saveNewDiscount(){
        $disc = Discounts::create([
            'name'=>$this->name_discount,
            'description'=>$this->description_discount,
            'contact'=>$this->contact_discount,
            'logo'=>'---'
        ]);
        $routePrincipal = $this->logo_discount->storeAs('public/discount-'.$disc->id, $this->logo_discount->getClientOriginalName());
        $disc->update([
            'logo'=>$routePrincipal,
        ]);
        $this->dispatchBrowserEvent('success', ['success'=>'Descuento creado con éxito']);

    }

}