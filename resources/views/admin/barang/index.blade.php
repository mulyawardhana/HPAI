@extends('layouts.base')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('barang.create')}}" class="btn btn-info"><i class="fas fa-plus"></i> Tambah Barang</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangs as $i=>$barang)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->stok}}</td>
                            <td>{{$barang->harga}}</td>
                            <td>
                                <form action="{{route('barang.destroy',$barang->id)}}" method="post">
                                @csrf
                                @method('DELETE')                              
                                <a href="{{route('barang.edit', $barang->id)}}" class="btn btn-primary"><i class="fas fa-edit">Edit </i></a>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
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
@endsection