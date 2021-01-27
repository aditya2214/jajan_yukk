<?php

namespace App\Http\Livewire\Component\Master;

use Livewire\Component;

class Homeslider extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.component.master.homeslider');
    }

    public function search(){
        // dd('test');
        $search = $this->search;

        // dd($search);
        $this->emit('search',$search);
    }
}
