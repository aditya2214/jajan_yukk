<?php

namespace App\Http\Livewire\Component\Toko;

use Livewire\Component;

class Home extends Component
{
    public $menu_item = 2;

    protected $listeners = [
        'lihat_katalog'=>'handlelihatkatalog'
        // 'katalogOpen'=>'handleOpenKatalog'
    ];

    public function render()
    {
        return view('livewire.component.toko.home',[
            
        ]);
    }
    
    // public function handleOpenKatalog($katalogOpen){
    //     $this->menu_item = $katalogOpen;
    // }

    public function menuitem1(){
        $this->menu_item = 1;
    }

    public function menuitem2(){
        $this->menu_item = 2;
    }

    public function menuitem3(){
        $this->menu_item = 3;
    }

    public function handlelihatkatalog($katalog){
        $this->menu_item =$katalog;
    }

    
}
