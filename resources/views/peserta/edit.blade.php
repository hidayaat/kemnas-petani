@extends('layouts.global')
@section('title') Edit User @endsection
@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
        action="{{route('peserta.update', [$peserta->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="nama"><b>Name</b></label>
        <input value="{{old('nama') ? old('nama') : $peserta->nama}}" class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="nama"
            id="nama" />
        <br>

        <label for="nomor_id"><b>Nomor Peserta</b></label>
        <input value="{{$peserta->nomor_id}}" disabled class="form-control" placeholder="username" type="text"
            name="nomor_id" id="nomor_id" />
        <br>

        <label for="jenis_kelamin"><b>Jenis Kelamin</b></label>
        <div class="col-md-12">
            <input value="laki-laki" name="jenis_kelamin" type="radio" class="form-control" id="laki-laki"
                {{$peserta->jenis_kelamin == 'laki-laki'? "checked" : ""}}>
            <label for="laki-laki">Laki-laki</label>
            <input value="perempuan" name="jenis_kelamin" type="radio" class="form-control" id="perempuan"
                {{$peserta->jenis_kelamin == 'perempuan'? "checked" : ""}}>
            <label for="perempuan">Perempuan</label>
        </div>
        <br>

        <label for="kategori"><b>Kategori</b></label>
        <div class="col-md-12">
            <input value="petani" name="kategori" type="radio" class="form-control" id="petani"
                {{$peserta->kategori == 'petani'? "checked" : ""}}>
            <label for="petani">Petani</label>
            <input value="polbangtan" name="kategori" type="radio" class="form-control" id="polbangtan"
                {{$peserta->kategori == 'polbangtan'? "checked" : ""}}>
            <label for="polbangtan">Polbangtan</label>
        </div>
        <br>

        <label for=""><b>Tempat Tanggal Lahir</b></label>
        <div class="d-flex">
            <input class="form-control col-6" value="{{old('tempat_lahir') ? old('tempat_lahir') : $peserta->tempat_lahir}}" type="text" name="tempat_lahir" id="tempat_lahir">
            <input class="form-control col-6" value="{{old('tanggal_lahir') ? old('tanggal_lahir') : $peserta->tanggal_lahir}}" type="date" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        <br>

        <label for="alamat"><b>Alamat</b></label>
        <textarea name="alamat" id="alamat" class="form-control">{{old('alamat') ? old('alamat') : $peserta->alamat}}</textarea>
        <br>

        <label for="nomor_hp"><b>Nomor HP</b></label>
        <input value="{{old('nomor_hp') ? old('nomor_hp') : $peserta->nomor_hp}}" type="text" name="nomor_hp" class="form-control">
        <br>

        <label for="foto"><b>Foto</b></label>
        <br>
        Foto sebelumnya:
        <br>
        @if($peserta->foto)
        <img src="{{asset('storage/'.$peserta->foto)}}" width="120px" />
        <br>
        @else
        Tidak ada foto
        @endif
        <br>
        <input id="foto" name="foto" type="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>

        <br>
        <hr class="my-3">
        <input class="btn btn-primary" type="submit" value="Save" />
    </form>
</div>
@endsection
