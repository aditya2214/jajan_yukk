<?php

namespace App\Http\Livewire\Component\Master;

use Livewire\Component;
use DB;
class Index extends Component
{
    public $nama_produk;
    public $harga;
    public $toko;
    public $img;
    public $pesanan=false;
    public $jumbel;
    public $array;
    
    protected $listeners = [
        'pesan'=>"handlePesan"
    ];

    public function render()
    {
        return view('livewire.component.master.index',[
            'produk' =>$this->array,
            'kurirs'=> DB::table('master_data_kurir')->get()
        ]);
    }

    public function handlePesan($id){
        // dd($id);
        $this->pesanan = true;

        $produk = DB::table('produk')
        ->join('profile_toko','produk.id_profil_toko','=','profile_toko.id')
        ->select('produk.*','profile_toko.nama_usaha')
        ->where('produk.id',$id)
        ->first();
        
        // dd($produk);
        // $this->array=$produk;
            // foreach ($produk as $key => $value) {
            //     # code...
                $this->nama_produk = $produk->nama_produk;
                $this->harga = $produk->harga_produk;
                $this->toko = $produk->nama_usaha;
                $this->img = $produk->gambar_produk;
            // }
    }

    public function kembali(){
        $this->pesanan = false;

        $this->jumbel = null;
    }
    


}
