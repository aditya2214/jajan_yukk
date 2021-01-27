<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                        <button wire:click="menuitem2" class="btn btn-outline-primary btn-sm">Katalog</button>
                        <button wire:click="menuitem3"  class="btn btn-outline-primary btn-sm">Edit Profil Toko
                        </button>
                        <div wire:loading wire:target="menuitem3"> 
                                Mohon Tunggu...
                        </div>
                        <div wire:loading wire:target="menuitem2"> 
                                Mohon Tunggu...
                        </div>
                    <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if($menu_item == 2)
                                <livewire:component.toko.produk></livewire:component.toko.produk>
                                @elseif($menu_item == 3)
                                <livewire:component.toko.edit-profil-toko></livewire:component.toko.edit-profil-toko>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
