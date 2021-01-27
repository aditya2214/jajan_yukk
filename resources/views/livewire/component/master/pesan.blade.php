<div>
    <div class="card">
        <div class="card-body">
            <strong>Silahkan Pilih Kurir</strong>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>Nama</th>
                    <!-- <th>Alamat</th> -->
                    <th>Telpon</th>
                    <th>WA</th>
                </thead>
                <tbody>
                    @foreach($kurirs as $kurir)
                    <tr>
                        <td>{{$kurir->Nama}}</td>
                        <!-- <td>{{$kurir->Alamat}}</td> -->
                        <td>{{$kurir->Telp}}</td>
                        <td>
                            <a href="" class="btn btn-success btn-sm" style="border-radius:100px;" >
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
