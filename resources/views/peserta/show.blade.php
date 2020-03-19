@extends('layouts.global')
@section('title') Detail user @endsection
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <b>Nomor Peserta</b><br>
            {{$peserta->nomor_id}}
            <br>
            <br>
            <b>Nama</b>
            <br/>
            {{$peserta->nama}}
            <br>
            <br>
            @if($peserta->foto)
            <img src="{{asset('storage/'. $peserta->foto)}}" width="128px" />
            @else
            Tidak Ada Foto
            @endif
            <br>
            <br>
            <b>Jenis Kelamin</b> <br>
            {{$peserta->jenis_kelamin}}
            <br>
            <br>
            <b>Tempat Tanggal Lahir</b> <br>
            {{$peserta->tempat_lahir}}, {{$peserta->tanggal_lahir}}
            <br>
            <br>
            <b>Alamat</b> <br>
            {{$peserta->alamat}}
            <br>
            <br>
            <b>Nomor HP</b> <br>
            {{$peserta->nomor_hp}}
            <br>
            <br>
        </div>
    </div>
</div>
@endsection
