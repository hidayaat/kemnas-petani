@extends("layouts.global")
@section("title") Users list @endsection
@section("content")

<h3>Daftar Peserta</h3>

<div class="row">
    <div class="col-md-6">
        <form action="{{route('peserta.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Cari berdasarkan nomor peserta.." />
                <div class="input-group-append">
                    <input type="submit" value="Cari" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<hr class="my-3">

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('peserta.create')}}" class="btn btn-primary">Tambahkan Peserta</a>
    </div>
</div>
<br>
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th><b>Nama</b></th>
            <th><b>Kategori</b></th>
            <th><b>Provinsi</b></th>
            <th><b>Utusan</b></th>
            <th><b>Foto</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($peserta as $p)
        <tr>
            <td>{{$p->nama}}</td>
            <td><b>{{$p->nomor_id}}</b></td>
            <td>{{$p->kategori}}</td>
            <td>{{$p->kategori}}</td>
            <td>
                @if($p->foto)
                <img src="{{asset('storage/'.$p->foto)}}" width="70px" />
                @else
                N/A
                @endif
            </td>
            <td>
                <a href="{{route('peserta.show', [$p->id])}}" class="btn btn-primary btn-sm">Rincian</a>
                <a class="btn btn-info text-white btn-sm" href="{{route('peserta.edit', [$p->id])}}">Sunting</a>
                <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline"
                    action="{{route('peserta.destroy', [$p->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan=10>
                {{$peserta->links()}}
            </td>
        </tr>
    </tfoot>
</table>



@endsection
