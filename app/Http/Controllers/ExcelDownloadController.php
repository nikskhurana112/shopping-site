<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;


class ExcelDownloadController extends Controller
{
    public function downloadData(){
        return Excel::download(new ProductExport, 'list.xlsx');
    }
}
