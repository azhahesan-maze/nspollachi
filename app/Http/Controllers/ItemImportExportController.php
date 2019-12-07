<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ItemsImport;
use Maatwebsite\Excel\Facades\Excel;

class ItemImportExportController extends Controller
{
    public function importExportView()
    {
       return view('admin.excel_import_export.item_import_export');
    }

    public function import(Request $request) 
    {

        $path = $request->file('file')->getRealPath();

     $data = Excel::import(new ItemsImport,$path);

     echo "<pre>";print_r($data);
     
     exit;

     Excel::import(new ItemsImport,request()->file('file'));
           
        return back();
    }
}
