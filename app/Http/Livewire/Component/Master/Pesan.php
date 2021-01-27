<?php

namespace App\Http\Livewire\Component\Master;

use Livewire\Component;
use DB;
class Pesan extends Component
{
 
    public $nama_produk;
    public $harga;
    public $toko;

    protected $listeners = [
        'pesan'=>"handlePesan"
    ];

    public function render()
    {
        return view('livewire.component.master.pesan',[
            'kurirs'=> DB::table('master_data_kurir')->get()
        ]);
    }

    public function handlePesan($produk){
        dd($produk);
    }
}
