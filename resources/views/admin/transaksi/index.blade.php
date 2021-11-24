@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <form action="{{ route('transaksi.store') }}" method="post">
                    <div class="row">
                            @csrf
                            <div class="col-md-6">
                                <input type="hidden" name="no_transaksi" value="{{ $no_transaksi }}">
                                <label for="kode_barang">Kode Barang / Nama Barang</label>
                                <select name="barang_id" id="" class="form-control">
                                    <option value="">Pilih Barang</option>
                                    @foreach($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gorup">
                                    <label for="qty">Qty</label>
                                    <input type="text" name="qty" id="" class="form-control">
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4" type="submit">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-body table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Qty</th>
                        <th>Harga @</th>
                        <th>Total harga</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $i=>$transaksi)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $transaksi->no_transaksi }}</td>
                            <td>{{$transaksi->created_at}}</td>
                            <td>{{ $transaksi->qty }}</td>
                            <td>{{ $transaksi->barang->harga }}</td>
                            <td>{{ $transaksi->qty * $transaksi->barang->harga }}</td>
                            <td>
                                <form action="{{route('transaksi.destroy',$transaksi->id)}}" method="post">
                                @csrf
                                @method('DELETE')                              
                                <a href="{{route('transaksi.edit', $transaksi->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit">Edit </i></a>
                                <button type="submit" class="btn btn-sm btn-danger">
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
