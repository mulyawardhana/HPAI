<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();

        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.create');
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
            'nama_barang'   => 'required',
            'harga'         => 'required',
            'kode_barang'   => 'required',
        ]);

        Barang::create([
            'nama_barang'   => $request->nama_barang,
            'harga'         => $request->harga,
            'kode_barang'   => $request->kode_barang,
            'created_by'    => Auth::id(),
            'stok'          => $request->stok,
        ]);

        return redirect('/barang');
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
        $barangs = Barang::findOrFail($id);

        return view('admin.barang.edit', compact('barangs'));
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
        $this->validate($request,[
            'nama_barang'   => 'required',
            'harga'         => 'required',
            'kode_barang'   => 'required',
        ]);

        $barang =[
            'nama_barang'   => $request->nama_barang,
            'harga'         => $request->harga,
            'kode_barang'   => $request->kode_barang,
            'created_by'    => Auth::id(),
            'stok'          => $request->stok,
        ];
        Barang::whereId($id)->update($barang);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete($barangs);
        return redirect()->back();
    }
}
