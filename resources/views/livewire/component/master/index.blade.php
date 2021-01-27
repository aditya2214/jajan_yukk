<div>
    <header>
		<livewire:component.master.mainmenu></livewire:component.master.mainmenu>
	</header>

	<main role="main">

	<section class="jumbotron text-center">
		<livewire:component.master.homeslider></livewire:component.master.homeslider>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">

            @if($pesanan)
            <button wire:click="kembali" class="btn btn-danger btn-sm">Kembali</button>

            <div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{asset('myfiles/'.$img ) }}" style="width:200px;display:block;margin-left:auto;margin-right:auto;" alt="">
                                        <p>Pesanan Anda : <strong>{{$nama_produk}}</strong></p> 
                                        
                                        <p>Harga    : <small>Rp{{number_format($harga+1000)}}</small></p>
                                    </div>
                                    <div class="card-footer">
                                        <p>Penjual : <strong>{{$toko}}</strong></p>
                                        <br><br>
                                        <p>Pesan Anda</p>
                                        <textarea wire:model="jumbel" placeholder="Contoh:Jumlah 2 rasa daun jeruk" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>                                   
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <strong>Silahkan Pilih Kurir</strong>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <th>Nama</th>
                                <th>Telpon</th>
                                <th>WA</th>
                            </thead>
                            <tbody>
                                @foreach($kurirs as $kurir)
                                <tr>
                                    <td>{{$kurir->Nama}}</td>
                                    <td>{{$kurir->Telp}}</td>
                                    <td>
                                        <a href="https://wa.me/{{$kurir->Telp}}?text=Tolong Antarkan Pesanan Saya *{{$nama_produk}}* di *{{$toko}}* ini Keterangannya *{{$jumbel}}* Terimakasi. Ini Alamat saya .................Tuliskan Alamat Anda................" class="btn btn-success btn-sm" style="border-radius:100px;" >
                                            <i class="fab fa-whatsapp" style="font-size: 30px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
			<livewire:component.master.maincontent></livewire:component.master.maincontent>
            @endif
        </div>
	</div>

	</main>

	<footer class="text-muted">
		<livewire:component.master.footer-bar></livewire:component.master.footer-bar>
	</footer>
</div>
