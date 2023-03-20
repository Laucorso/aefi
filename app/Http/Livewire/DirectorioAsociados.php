<?php
namespace App\Http\Livewire;

use App\Models\FlowerShop;
use Livewire\WithPagination;
use Livewire\Component;

class DirectorioAsociados extends Component
{
    use WithPagination;

    public $codes, $provinces, $cities;
    public $shop_name = '', $shop_province = '', $shop_postal_code = '', $shop_city = '';
    public function render()
    {
        $this->codes = FlowerShop::select('postal_code')->distinct()->get();
        $this->provinces = FlowerShop::select('province')->distinct()->get();
        $this->cities = FlowerShop::select('city')->distinct()->get();

        $shops = FlowerShop::where('title', 'ilike', "%".$this->shop_name."%")
                            ->where('postal_code', 'like', "%".$this->shop_postal_code."%")
                            ->where('province', 'LIKE', '%'.$this->shop_city.'%')
                            ->where('city', 'LIKE', '%'.$this->shop_city.'%');

        return view('livewire.directorio-asociados', ['shops'=>$shops->paginate(12)]);
    }
    public function searchShops(){
    }

    public function updatingShopName()
    {
        $this->resetPage();
    }
    public function cleanSearch(){
        $this->shop_name = '';
        $this->shop_postal_code = '';
        $this->shop_city = '';
        $this->shop_province = '';
    }

}