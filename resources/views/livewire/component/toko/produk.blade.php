<div>
    <div class="row">
    <!-- {{Request::url()}} -->
    @if($status)
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
        @if($updated)
        <div class="col-md-6 offset-md-3">      
            <div class="card"> 
                <div class="card-body">
                    <form wire:submit.prevent="UpdateProduk">
                        <input wire:model="id_p" type="hidden" name="" id="">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input wire:model="nama_produk" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Produk</label>
                            <input wire:model="harga_produk" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Produk</label>
                            <select wire:model="kategrori_produk" class="form-control" id="exampleFormControlSelect1">
                                <option style="background-color:grey;" value="">@select</option>
                                @foreach($kategoris as $key=>$kategori)
                                <option value="{{$kategori->id}}" style="background-color:yellow;">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status Produk</label>
                            <select  wire:model="status_produk" class="form-control" id="exampleFormControlSelect1">
                                <option style="background-color:grey;" >@select</option>
                                <option style="background-color:yellow;">Tersedia</option>
                                <option style="background-color:yellow;">Kosong</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dagangan</label>
                            <select  wire:model="id_toko" class="form-control" id="exampleFormControlSelect1">
                                <option style="background-color:grey;" >@select</option>
                                @foreach($usahas as $key=>$usaha)
                                <option value="{{$usaha->id}}" style="background-color:yellow;">{{$usaha->nama_usaha}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <img src="{{asset ('myfiles/'.$img ) }}" style="width:100px;" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Upload Gambar Produk</label>
                            <input wire:model="img" type="file" class="form-control" name="" id="">
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-success form-control">Update Produk</button>
                        </div>
                    </form>
                        <div>
                            <button wire:click="batal" class="btn btn-danger form-control">Batal</button>
                        </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-6 offset-md-3">      
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="StoreProduk">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input wire:model="nama_produk" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Produk</label>
                            <input wire:model="harga_produk" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Produk</label>
                            <select wire:model="kategrori_produk" class="form-control" id="exampleFormControlSelect1">
                                <option style="background-color:grey;" value="">@select</option>
                                @foreach($kategoris as $key=>$kategori)
                                <option value="{{$kategori->id}}" style="background-color:yellow;">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status Produk</label>
                            <select  wire:model="status_produk" class="form-control" id="exampleFormControlSelect1">
                                <option style="background-color:grey;" >@select</option>
                                <option style="background-color:yellow;">Tersedia</option>
                                <option style="background-color:yellow;">Kosong</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dagangan</label>
                            <select  wire:model="id_toko" class="form-control" id="exampleFormControlSelect1">
                                <option style="background-color:grey;" >@select</option>
                                @foreach($usahas as $key=>$usaha)
                                <option value="{{$usaha->id}}" style="background-color:yellow;">{{$usaha->nama_usaha}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Gambar Produk</label>
                            <input wire:model="img" type="file" class="form-control" name="" id="">
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-success form-control">Tambah Produk</button>
                        </div>
                    </form>
                        <div>
                            <button wire:click="batal" class="btn btn-danger form-control">Batal</button>
                        </div>
                </div>
            </div>
        </div>
        @endif
    @else
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card-header">
                <button wire:click="addProduk" class="btn btn-primary btn-sm">Tambah Produk</button>
            </div>
        </div>
    </div>
        <style>
        #size {
            width:100%;
            height:150px;
        }
        </style>
        <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach($produk as $prod)
                <div class="col-md-3" >
                    <div class="card mb-3 shadow-sm" style="background: rgb(0,255,235); background: linear-gradient(90deg, rgba(0,255,235,1) 24%, rgba(134,215,187,1) 61%);">
                        <img id="size" src="{{asset ('myfiles/'.$prod->gambar_produk )}}" alt="Cinque Terre" width="600" height="400">
                        <div class="card-body">
                        <p class="card-text"><strong>{{$prod->nama_produk}}</strong><br><p>Harga : Rp{{number_format($prod->harga_produk) }} <small>{{$prod->id_status}}</small></p></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button wire:click="edit({{$prod->id}})" class="btn btn-sm btn-warning">Edit</button>
                                <button wire:click="hapus({{$prod->id}})" class="btn btn-sm btn-danger">Hapus</button>
                            </div>
                            <small class="text-muted">{{$prod->created_at}}</small>
                        </div>
                        <br>
                        <div>
                        <strong>{{$prod->nama_usaha}}</strong>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$produk->links()}}
        </div>
    </div>
    @endif
</div>
