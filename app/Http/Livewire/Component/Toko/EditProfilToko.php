<?php

namespace App\Http\Livewire\Component\Toko;

use Livewire\Component;
use DB;
use Auth;
use Livewire\WithFileUploads;

class EditProfilToko extends Component
{
    use WithFileUploads;
    public $nama_usaha;
    public $nama_ceo;
    public $alamat;
    public $no_telp;
    public $img;
    public $status;
    public $updated=false;
    public function render()
    {
        return view('livewire.component.toko.edit-profil-toko', [
            'profile_tokos' => DB::table('profile_toko')->where('id_user',Auth::user()->id)->get()
        ]);
    }

    public function storeUsaha(){
        dd($this->img);
        $store = DB::table('profile_toko')->insert([
            'nama_usaha'=>$this->nama_usaha,
            'nama_ceo'=>$this->nama_ceo,
            'alamat'=>$this->alamat,
            'no_telp'=>$this->no_telp,
            // 'img'=>$this->img->store('usaha/'.Auth::user()->email, ['disk' => 'my_files']),
            'id_user'=>Auth::user()->id
        ]);
        $this->resetInput();
        $this->status = false;
    }

    public function resetInput(){
     $this->nama_usaha=null;
     $this->nama_ceo=null;
     $this->alamat=null;
     $this->no_telp=null;
     $this->img=null;
     $this->status=null;
    }

    public function addProduk(){
        $this->status = true;
        $this->updated=false;
    }

    public function batal(){
        $this->status = false;
    }

    public function hapus($id){
        $produk = DB::table('produk')->where('id_profil_toko',$id)->first();
        if($produk == null)  {
            DB::table('profile_toko')->where('id',$id)->delete();
        }else{
            session()->flash('error', 'Masih ada produk di toko ini, Periksa Katalog dan hapus terlebih dahulu');
        }
    }

    public function edit($id){
        $this->status = true;
        $this->updated=true;
        $update = DB::table('profile_toko')->where('id',$id)->first();
        $this->nama_usaha=$update->nama_usaha;
        $this->nama_ceo=$update->nama_ceo;
        $this->alamat=$update->alamat;
        $this->no_telp=$update->no_telp;
        $this->img=$update->img;
    }

    public function UpdatedUsaha(){
        try {
            //code...
            $store = DB::table('profile_toko')->update([
                'nama_usaha'=>$this->nama_usaha,
                'nama_ceo'=>$this->nama_ceo,
                'alamat'=>$this->alamat,
                'no_telp'=>$this->no_telp,
                'img'=>$this->img->store('usaha/'.Auth::user()->email, ['disk' => 'my_files'])
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $store = DB::table('profile_toko')->update([
                'nama_usaha'=>$this->nama_usaha,
                'nama_ceo'=>$this->nama_ceo,
                'alamat'=>$this->alamat,
                'no_telp'=>$this->no_telp,
                // 'img'=>$this->img->store('usaha/'.Auth::user()->email, ['disk' => 'my_files'])
            ]);
        }
        

        $this->resetInput();
        $this->status = false;
        $this->updated=false;
    }
}
