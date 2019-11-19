@extends("layouts.global")

@section("title") Home @endsection

@section("judulHalaman") Panel Produk @endsection

@section("isiHalaman")
    <div class="row">
        <div class="col-xl-12">

            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                                   style="margin-bottom: 5px">
                                <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($isi as $value)
                                    <tr>
                                        <td>{{$value['nama_produk']}}</td>
                                        <td>{{$value['harga_produk']}}</td>
                                        <td>{{$value['kategori_produk']}}</td>
                                        <td>{{$value['tersedia']}}</td>
                                        <td>{{$value['deskripsi']}}</td>
                                        <td><img src="{{$value['url_gambar']}}" style="width: 50px; height: 50px"></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-danger btn-icon-split" href="{{route('delete',['id'=>$value['id_produk']])}}">
                                                <span class="icon text-white">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('totambahProduk')}}" class="btn btn-primary btn-icon-split float-right"
                               style="margin-top: 2%">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                <span class="text" style="letter-spacing: 3px">Tambah</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_tabel')
    <script src="{{asset('front/js/demo/datatables-demo.js')}}"></script>
@endsection
