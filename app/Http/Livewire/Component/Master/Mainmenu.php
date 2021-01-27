<?php

namespace App\Http\Livewire\Component\Master;

use Livewire\Component;
use DB;
class Mainmenu extends Component
{
    public function render()
    {
        return view('livewire.component.master.mainmenu',[
            'kategoris' => DB::table('master_data_kategori')->get()
        ]);
    }
}
