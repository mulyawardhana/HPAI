<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
// use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $transaksis;

    public function __construct($transaksis)
    {
        $this->transaksis = $transaksis;
    }
    public function view():View
    {
        return view('admin.report.report',[
            'transaksis'=>$this->transaksis
         ]);
    }
}
