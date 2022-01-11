@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Transaksi</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Transaksi
                    <a href="{{route('penjualan.create')}}" class="btn btn-sm btn-outline-primary float-right">Transaksi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Rekening</th>
                                    <th>No Rekening</th>
                                    <th>Bank</th>
                                    <th>Judul Buku</th>
                                    <th>Harga Buku</th>
                                    <th>Total Buku</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($penjualan as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->nama_rek}}</td>
                                        <td>{{$data->no_rek}}</td>
                                        <td>{{$data->bank}}</td>
                                        <td>{{$data->buku->judul_buku}}</td>
                                        <td>{{$data->buku->harga}}</td>
                                        <td>{{$data->total_buku}}</td>
                                        <td>{{$data->total_harga}}</td>
                                        <td>
                                            <form action="{{route('penjualan.destroy',$data->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{route('penjualan.edit',$data->id)}}" class="btn btn-outline-info">Edit</a><br>
                                                <a href="{{route('penjualan.show',$data->id)}}" class="btn btn-outline-warning">Show</a><br>
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapusnya')">Hapus</button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
<script src="{{asset('Datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
