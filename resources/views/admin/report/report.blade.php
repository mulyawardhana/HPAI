<table>
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