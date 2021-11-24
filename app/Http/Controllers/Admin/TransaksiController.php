<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barangs = Barang::get();
        $transaksis = Transaksi::all();
        $max = DB::table('transaksis')->where('no_transaksi', \DB::raw("(select max(`no_transaksi`) from transaksis)"))->pluck('no_transaksi');
        $check_max = DB::table('transaksis')->count();
        if($check_max == null){
            $no_transaksi = "HNI0001";
        }else{
            $no_transaksi = $max[0];
            $no_transaksi++;
           
        }
        return view('admin.transaksi.index', compact('barangs','transaksis','no_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'qty'   => 'required',
        ]);
        Transaksi::create([
            'qty'               => $request->qty,
            'no_transaksi'      => $request->no_transaksi,
            'total_harga'       => $request->qty ,
            'barang_id'         => $request->barang_id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksis = Transaksi::findOrFail($id);
        $transaksis->delete($transaksis);
        return redirect()->back();
    }

}
