<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportProduct;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUploadController extends Controller
{
    public function uploadData(){

        return view("excel.upload");
    }
    public function excelCreate(Request $req)
    {

        Excel::import(new ImportProduct("test"), $req->excel_data);
        return redirect()->back();
        
    }
}
