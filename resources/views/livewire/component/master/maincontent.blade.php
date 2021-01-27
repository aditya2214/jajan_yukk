<div>
    <style>
        #size {
            width:100%;
            height:250px;
        }
    </style>
    <br>
    <div class="row">
        @foreach($contents as $content)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
          <img id="size" src="{{asset ('myfiles/'.$content->gambar_produk )}}" alt="Cinque Terre" width="600" height="400">
            <div class="card-body" style="background: rgb(0,206,255); background: linear-gradient(90deg, rgba(0,206,255,1) 24%, rgba(134,215,206,1) 61%);">
            <p class="card-text"><strong>{{$content->nama_produk}}</strong><br><p>Harga : Rp{{number_format($content->harga_produk) }} + ongkir Rp. 1000 <br><small>{{$content->id_status}}</small></p></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <button wire:click="pesan({{$content->id}})" class="btn btn-success form-control" >Pesan</button>
                </div>
                <small class="text-muted">{{$content->created_at}}</small>
            </div>
            <br>
            <div>
            <strong>{{$content->nama_usaha}}</strong>
            </div>
            </div>
          </div>
        </div>
        @endforeach
	</div>
    {{ $contents->links() }}
    <div class="card" style="border-radius:20px;">
        <div class="card-body fixed-bottom" >
            <i class="fas fa-search"></i>&nbsp;Searching
            <form wire:submit.prevent="search">
              <input wire:model="search" type="text" placeholder="Ketik disini" style="border-radius:20px;"  class="form-control" name="" id="">
            </form>
          </div>
      </div>
</div>