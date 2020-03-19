@extends("layouts.global")
@section("title") Tambahkan Peserta @endsection
@section("content")

<div class="col-md-8">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('peserta.store')}}"
        method="POST">

        @csrf

        <label for="nama"><b>Nama</b></label>
        <input value="{{old('nama')}}" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}"
            placeholder="contoh: Andi Batara" type="text" name="nama" id="nama" />
        <div class="invalid-feedback">
            {{$errors->first('nama')}}
        </div>
        <br>

        <label for="nomor_id"><b>Nomor Peserta</b></label>
        <input value="{{old('nomor_id')}}" class="form-control {{$errors->first('nomor_id') ? "is-invalid" : ""}}"
            placeholder="contoh: 01.001.01" type="text" name="nomor_id" id="nomor_id" />
        <div class="invalid-feedback">
            {{$errors->first('nomor_id')}}
        </div>
        <br>

        <label for="nomor_id"><b>Provinsi</b></label>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pilih Provinsi
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Aceh</a>
                <a class="dropdown-item" href="#">Bengkulu</a>
                <a class="dropdown-item" href="#">Jambi</a>
                <a class="dropdown-item" href="#">Bangka Belitung</a>
                <a class="dropdown-item" href="#">Kepulauan Riau</a>
                <a class="dropdown-item" href="#">Riau</a>
                <a class="dropdown-item" href="#">Lampung</a>
                <a class="dropdown-item" href="#">Sumatra Barat</a>
                <a class="dropdown-item" href="#">Sumatra Selatan</a>
                <a class="dropdown-item" href="#">Sumatra Utara</a>
                <a class="dropdown-item" href="#">Banten</a>
                <a class="dropdown-item" href="#">DKI Jakarta</a>
                <a class="dropdown-item" href="#">Jawa Barat</a>
                <a class="dropdown-item" href="#">Jawa Tengah</a>
                <a class="dropdown-item" href="#">Jawa Timur</a>
                <a class="dropdown-item" href="#">Kalimantan Barat</a>
                <a class="dropdown-item" href="#">Kalimantan Selatan</a>
                <a class="dropdown-item" href="#">Kalimantan Tengah</a>
                <a class="dropdown-item" href="#">Kalimantan Timur</a>
                <a class="dropdown-item" href="#">Kalimantan Utara</a>
                <a class="dropdown-item" href="#">Maluku</a>
                <a class="dropdown-item" href="#">Maluku Utara</a>
                <a class="dropdown-item" href="#">Bali</a>
                <a class="dropdown-item" href="#">Nusa Tenggara Barat</a>
                <a class="dropdown-item" href="#">Nusa Tenggara Timur</a>
                <a class="dropdown-item" href="#">Papua</a>
                <a class="dropdown-item" href="#">Papua Barat</a>
                <a class="dropdown-item" href="#">Sulawesi Barat</a>
                <a class="dropdown-item" href="#">Sulawesi Tengah</a>
                <a class="dropdown-item" href="#">Sulawesi Tenggara</a>
                <a class="dropdown-item" href="#">Sulawesi Utara</a>
                <a class="dropdown-item" href="#">Sulawesi Selatan</a>
                <a class="dropdown-item" href="#">Gorontalo</a>
                <a class="dropdown-item" href="#">DIY Yogyakarta</a>
            </div>
        </div>

        <br>
        <label for=""><b>Jenis Kelamin</b></label>
        <div class="col-md-12">
            <input value="laki-laki" name="jenis_kelamin" type="radio"
                class="form-control {{$errors->first('jenis_kelamin') ? "is-invalid" : ""}}" id="laki-laki">
            <label for="laki-laki">Laki-laki</label>
            <input value="perempuan" name="jenis_kelamin" type="radio"
                class="form-control {{$errors->first('jenis_kelamin') ? "is-invalid" : ""}}" id="perempuan">
            <label for="perempuan">Perempuan</label>
            <div class="invalid-feedback">
                {{$errors->first('jenis_kelamin')}}
            </div>
        </div>
        <br>

        <label for=""><b>Kategori</b></label>
        <div class="col-md-12">
            <input value="SMKPP/SMA" name="kategori" type="radio"
                class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" id="SMKPP/SMA">
            <label for="SMKPP/SMA">SMKPP/SMA</label>
            <input value="Polbangtan" name="kategori" type="radio"
                class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" id="Polbangtan">
            <label for="Polbangtan">Polbangtan</label>
            <input value="PTN Mitra" name="kategori" type="radio"
                class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" id="PTN Mitra">
            <label for="PTN Mitra">PTN Mitra</label>
            <input value="Petani/P4S" name="kategori" type="radio"
                class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" id="Petani/P4S">
            <label for="Petani/P4S">Petani/P4S</label>
            <input value="Penyuluh" name="kategori" type="radio"
                class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" id="Penyuluh">
            <label for="Penyuluh">Penyuluh</label>

            <div class="invalid-feedback">
                {{$errors->first('kategori')}}
            </div>
        </div>
        <br>

        <label for="utusan"><b>Utusan</b></label>
        <input class="form-control" placeholder="contoh: Polbangtan Gowa" type="text" name="utusan" id="utusan" />
        <div class="invalid-feedback">
            {{$errors->first('utusan')}}
        </div>
        <br>

        <label for=""><b>Tempat Tanggal Lahir</b></label>
        <div class="d-flex">
            <input class="form-control col-6 {{$errors->first('tempat_lahir') ? "is-invalid" : ""}}" type="text"
                name="tempat_lahir" id="tempat_lahir">
            <input class="form-control col-6 {{$errors->first('tanggal_lahir') ? "is-invalid" : ""}}" type="date"
                name="tanggal_lahir" id="tanggal_lahir">

        </div>
        <div class="invalid-feedback">
            {{$errors->first('tempat_lahir')}}
        </div>
        <div class="invalid-feedback">
            {{$errors->first('tanggal_lahir')}}
        </div>
        <br>

        <label for="alamat"><b>Alamat</b></label>
        <textarea name="alamat" id="alamat"
            class="form-control {{$errors->first('alamat') ? "is-invalid" : ""}}"></textarea>
        <div class="invalid-feedback">
            {{$errors->first('alamat')}}
        </div>
        <br>

        <label for="nomor_hp"><b>Nomor HP</b></label>
        <input type="text" name="nomor_hp" class="form-control {{$errors->first('nomor_hp') ? "is-invalid" : ""}}">
        <div class="invalid-feedback">
            {{$errors->first('nomor_hp')}}
        </div>
        <br>

        <label for="foto"><b>Foto</b></label>
        <br>
        <input id="foto" name="foto" type="file" class="form-control {{$errors->first('foto') ? "is-invalid" : ""}}">
        <div class="invalid-feedback">
            {{$errors->first('foto')}}
        </div>

        <hr class="my-3">

        <input class="btn btn-primary" type="submit" value="Save" />
    </form>
</div>


@endsection
