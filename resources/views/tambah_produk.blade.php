@extends("layouts.global")

@section("title") Home @endsection

@section("judulHalaman") Pengajuan Pelaksanaan Medex @endsection

@section("isiHalaman")
    <div class="row">
        <div class="col-xl-12">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-left-warning">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Produk
                        </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="height:430px;overflow-y: scroll">
                        <form action="{{route('tambahProduk')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="namaProduk" class="text-gray-600" style="font-size: 14px ">Nama Produk
                                : </label>
                            <input type="text"
                                   class="form-control form-control-user @error('deskripsiProduk') is-invalid @enderror"
                                   name="namaProduk"
                                   id="namaProduk"
                                   value="">
                            @error('deskripsiProduk')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <label for="hargaProduk" class="text-gray-600"
                                   style="font-size: 14px; padding-top: 2% ">Harga Produk :</label>
                            <input type="text"
                                   class="form-control form-control-user @error('hargaProduk') is-invalid @enderror"
                                   name="hargaProduk"
                                   id="hargaProduk"
                                   value="">
                            @error('hargaProduk')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <label for="kategoriProduk" class="text-gray-600"
                                   style="font-size: 14px; padding-top: 2% ">Kategori Produk : </label>
                            <select class="form-control form-control-user" name="kategoriProduk" id="kategoriProduk">
                                <option value="Bibit">Bibit</option>
                                <option value="Pupuk dan Obat">Pupuk dan Obat</option>
                                <option value="Alat">Alat Pertanian</option>
                                <option value="Hasil Tani">Hasil Pertanian</option>
                            </select>

                            <label for="jumlahProduk" class="text-gray-600"
                                   style="font-size: 14px; padding-top: 2% ">Jumlah Produk : </label>
                            <input type="number"
                                   class="form-control form-control-user @error('jumlahProduk') is-invalid @enderror"
                                   name="jumlahProduk">
                            @error('jumlahProduk')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <label for="deskripsiProduk" class="text-gray-600"
                                   style="font-size: 14px; padding-top: 2% ">Deskripsi Produk : </label>
                            <input type="text"
                                   class="form-control form-control-user @error('deskripsiProduk') is-invalid @enderror"
                                   name="deskripsiProduk">
                            @error('deskripsiProduk')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <label for="gambarProduk" class="text-gray-600"
                                   style="font-size: 14px; padding-top: 2% ">Gambar Produk : </label>

                            <input type="file"
                                   class="form-control @error('gambarProduk') is-invalid @enderror"
                                   name="gambarProduk">
                            @error('gambarProduk')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <button class="btn btn-success btn-icon-split float-right" style="margin-top: 2%">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                <span class="text">Tambah</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

