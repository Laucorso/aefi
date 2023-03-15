<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\FlowerShop;
use App\Models\ProductShop;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\WithFileUploads;
use Livewire\Component;

class AreaPrivada extends Component
{
    use WithFileUploads;

    public $shops, $selectedShop, $products, $selectedShopDirecto, $productToCreate = false, $categories = [], $categories_checked = [], $selectedCategory = '';
    public $shop_title, $shop_contact_name,$shop_product_name, $shop_img_product, $shop_logo, $shop_direction_maps, $shop_img_principal, $shop_direction, $shop_email, $shop_phone, $shop_description, $shop_province, $shop_city, $shop_url, $shop_product_url, $shop_code, $shop_whats_phone;
    public function render()
    {
        Auth::user()->assignRole('Client');
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
        $this->shops = Auth::User()->shops;
        $this->categories = Category::all();
        return view('livewire.area-privada');
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
}
