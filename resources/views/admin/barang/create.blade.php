@extends('layouts.base')
@section('content')
<div class="container-fluid">




    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
        </div>
        <div class="card-body">
            <form action="{{route('barang.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" name="kode_barang" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" name="stok" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" >Simpan</button>
            </div> 
            </form>
        </div>
    </div>

</div>
@endsection