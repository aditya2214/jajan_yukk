<?php

namespace App\Http\Livewire\Component\Master;

use Livewire\Component;
use DB;
use Livewire\WithPagination;
class Maincontent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pesanan;
    public $search;

    // protected $listeners = [
    //     'search'=>'handleSearch'
    // ];


    public function render()
    {
        return view('livewire.component.master.maincontent',[
            // 'kategoris'=>DB::table('master_data_kategori')->where('id',1)
            'contents' => DB::table('produk')
                            ->join('profile_toko','produk.id_profil_toko','=','profile_toko.id')
                            ->join('master_data_kategori','produk.id_kategrori','=','master_data_kategori.id')
                            ->select('produk.*','profile_toko.nama_usaha','master_data_kategori.nama_kategori')
                            ->orderBy('created_at','DESC')
                            ->where('nama_produk','like','%'.$this->search.'%')
                            ->Orwhere('harga_produk','like','%'.$this->search.'%')
                            ->Orwhere('profile_toko.nama_usaha','like','%'.$this->search.'%')
                            // ->get()
                            ->paginate(9)
            // 'kategori' => DB::table('produk')
            //                 ->join('master_data_kategori','produk.id_kategrori','=','master_data_kategori.id')
            //                 ->select('master_data_kategori.nama_kategori')
            //                 ->first(),
        ]);
    }

    // public function handleSearch($search){
    //     $this->search = $search;
    // }

    public function pesan($id){
        // $id = $this->pesanan;

        $this->emit('pesan',$id);
    }

    public function search(){
        // dd('test');
        $search = $this->search;

        // dd($search);
        // $this->emit('search',$search);
    }
}
