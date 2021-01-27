<div>
        @if (session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('error') }}    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <div class="row">
        @if($status)
        <div class="col-md-6 offset-md-3"> 
             <div class="card">
                <div class="card-body">
                    
                    @if($updated)
                    <form wire:submit.prevent="UpdatedUsaha">
                        <div class="form-group">
                            <label for="">Nama Uaha</label>
                            <input wire:model="nama_usaha" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pemilik</label>
                            <input wire:model="nama_ceo" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input wire:model="alamat" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input wire:model="no_telp" type="text" class="form-control">
                        </div>
                        <div class="">
                            <img src="{{asset ('myfiles/'.$img ) }}" style="width:100px;" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Banner / Foto Usaha</label>
                            <input wire:model="img" type="file" class="form-control">
                        </div>
                        <p id="size"></p> 
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-success form-control" >Update</button>
                        </div>
                    </form>
                    @else
                    <form wire:submit.prevent="storeUsaha">
                        <div class="form-group">
                            <label for="">Nama Uaha</label>
                            <input wire:model="nama_usaha" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pemilik</label>
                            <input wire:model="nama_ceo" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input wire:model="alamat" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input wire:model="no_telp" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Banner / Foto Usaha</label>
                            <input wire:model="img" type="file" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-success form-control" >Simpan</button>
                        </div>
                    </form>
                    @endif
                        <div>
                            <button wire:click="batal" class="btn btn-danger form-control">Batal</button>
                        </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-4">
            <div class="card-header">
                <button wire:click="addProduk" class="btn btn-primary btn-sm">Buka Toko</button>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($profile_tokos as $profil_toko)
        <div class="col-md-4" >
            <div class="card" style="background: rgb(0,255,235); background: linear-gradient(90deg, rgba(0,255,235,1) 24%, rgba(134,215,187,1) 61%); margin:5px;">
                <div class="card-header ">
                <div class="btn-group">
                    <button wire:click="edit({{$profil_toko->id}})" class="btn btn-warning btn-sm">Edit</button>
                    <button wire:click="hapus({{$profil_toko->id}})" class="btn btn-danger btn-sm">Hapus</button>
                </div>
                </div>
                <div class="card-body">
                    <img src="{{asset ('myfiles/'.$profil_toko->img)}}" style="width:200px; display:block; margin-left:auto; margin-right:auto;" alt="">
                    <h5 class="text-center"><strong>{{$profil_toko->nama_usaha}}</strong></h5>
                    <hr>
                    <p><b>Pemiilik Usaha</b>&nbsp;:&nbsp;{{$profil_toko->nama_ceo}}</p>
                    <p><b>Alamat Usaha</b>&nbsp;:&nbsp;{{$profil_toko->alamat}}</p>
                    <p><b>No Telp</b>&nbsp;:&nbsp;{{$profil_toko->no_telp}}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
