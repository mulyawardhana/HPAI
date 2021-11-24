@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <form action="{{route('report.transaksi')}}" method="post">
                    <div class="row">
                            @csrf
                            <div class="col-md-4">
                                <label for="kode_barang">Dari Tanggal</label>
                                <input type="date" name="tanggal1" id="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <div class="form-gorup">
                                    <label for="qty">Sampai Tanggal</label>
                                    <input type="date" name="tanggal2" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <br>
                            <div class="form-group">
                                <button class="btn btn-success mt-1" type="submit"><i class="fas fa-filter"></i> Filter</button>
                            </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if($hitung == 0)
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
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-header">
                <div class="p-2 bd-highlight">
                <form action="{{route('report.excel')}}">
                    <input type="hidden" name="tanggal1" value="{{$req1}}">
                    <input type="hidden" name="tanggal2" value="{{$req2}}">
                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Export
                        Excel</button>
                </form>
            </div>
        </div>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $i=>$t)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$t->no_transaksi}}</td>
                            <td>{{$t->created_at}}</td>
                            <td>{{$t->qty}}</td>
                            <td>{{$t->barang->harga}}</td>
                            <td>{{$t->qty * $t->barang->harga}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endif
@endsection
