<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open = false;

    // mantente a la escucha de la propiedad search
    // al precedír el nombre de la propiedad con updated nos mantenemos a la escucha de la propiedad
    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {

        if ($this->search) {
            $products = Product::where('name', 'LIKE', "%" . $this->search . "%")
                                ->where('status', 2)
                                ->take(8)
                                ->get();
        } else {
            $products = [];
        }

        return view('livewire.search', compact('products'));
    }
}
