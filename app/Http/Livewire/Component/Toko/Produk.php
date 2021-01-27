<?php

namespace App\Http\Livewire\Component\Toko;

use Livewire\Component;
use DB;
use Livewire\WithFileUploads;
use Auth;
use Livewire\WithPagination;
class Produk extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_p;
    public $nama_produk;
    public $harga_produk;
    public $kategrori_produk;
    public $status_produk;
    public $img;
    public $id_toko;
    public $status = false;
    public $updated = false;

    public function render()
    {
        return view('livewire.component.toko.produk',[
            'kategoris' => DB::table('master_data_kategori')->get(),
            'satuans' => DB::table('master_data_satuan')->get(),
            'usahas' => DB::table('profile_toko')->where('id_user',Auth::user()->id)->get(),
            'produk' =>DB::table('produk')
            ->leftjoin('profile_toko','produk.id_profil_toko','=','profile_toko.id')
            ->where('produk.id_user',Auth::user()->id)
            ->select('produk.*','profile_toko.nama_usaha')
            ->orderBy('produk.created_at','DESC')
            ->paginate(8)

        ]);
    }

    public function StoreProduk(){
        $getToko = DB::table('profile_toko')->where('id_user',Auth::user()->id)->first();
        if($getToko == null){
            session()->flash('error', 'Anda Belum Mengisi identitas Toko');
            // dd('dia menjalankan ini');
        }else{
            $id = $getToko->id;

            $store = DB::table('produk')->insert([
                'nama_produk'=>$this->nama_produk,
                'harga_produk'=>$this->harga_produk,
                'id_status'=>$this->status_produk,
                'id_kategrori'=>$this->kategrori_produk,
                'gambar_produk'=> $this->img->store('produk/'.Auth::user()->email, ['disk' => 'my_files']),
                'id_user'=>Auth::user()->id,
                'id_profil_toko'=>$this->id_toko
                ]);
    
                $this->resetInput();

                $this->status = false;
        }

    }

    public function resetInput(){

        $this->nama_produk = null;
        $this->harga_produk= null;
        $this->satuan_produk= null;
        $this->status_produk= null;
        $this->kategrori_produk= null;
        $this->id_toko = null;
        $this->img=null;
    }

    public function addProduk(){
        $this->status = true;
        $this->updated = false;
    }

    public function batal(){
        $this->status = false;
        $this->nama_produk = null;
        $this->harga_produk= null;
        $this->satuan_produk= null;
        $this->status_produk= null;
        $this->kategrori_produk= null;
        $this->id_toko = null;
        $this->img=null;
    }

    public function edit($id){
        $this->updated = true;
        $this->status = true;
        $edit = DB::table('produk')->where('id',$id)->first();
        $this->id_p = $edit->id;
        $this->nama_produk = $edit->nama_produk;
        $this->harga_produk= $edit->harga_produk;
        // $this->satuan_produk= $edit->id_satuan;
        $this->status_produk= $edit->id_status;
        $this->kategrori_produk= $edit->id_kategrori;
        $this->id_toko = $edit->id_profil_toko;
        $this->img=$edit->gambar_produk;
    }

    public function hapus($id){
        DB::table('produk')->where('id',$id)->delete();
    }

    public function UpdateProduk(){
        try {
            //code...
            $Update = DB::table('produk')->where('id',$this->id_p)->update([
                'nama_produk'=>$this->nama_produk,
                'harga_produk'=>$this->harga_produk,
                'id_status'=>$this->status_produk,
                'id_kategrori'=>$this->kategrori_produk,
                'gambar_produk'=> $this->img->store('produk/'.Auth::user()->email, ['disk' => 'my_files'])
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $Update = DB::table('produk')->where('id',$this->id_p)->update([
                'nama_produk'=>$this->nama_produk,
                'harga_produk'=>$this->harga_produk,
                'id_status'=>$this->status_produk,
                'id_kategrori'=>$this->kategrori_produk,
                // 'gambar_produk'=> $this->img->store('produk/'.Auth::user()->email, ['disk' => 'my_files'])
            ]);
        }
       
        
        $this->resetInput();
        $this->updated=false;
        $this->status=false;
        
    }
}
