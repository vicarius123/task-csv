<?php

namespace App\Http\Controllers;

use App\csvImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;


class ImportController extends Controller
{
  public function getImport()
  {
    return view('import');
  }
  public function parseImport(CsvImportRequest $request)
  {
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
    $csv_data = array_slice($data, 1);
    $request->session()->put('table_data', json_encode($csv_data));
    return view('import_fields', compact('csv_data'));
  }

  public function processImport(Request $request){
    $csv_data = $request->table;
    $all_data = json_decode($request->session()->get('table_data'));
    if($csv_data){
      foreach($csv_data as $key=>$data){

        foreach($data as $k=>$dt){
          $all_data[$key][$k] = $dt;
        }
      }
    }
    $saving = ['order_info' => json_encode($all_data)];
    $id = csvImport::create($saving)->id;
    $request->session()->flush();
    return view('import_success', compact('id'));

  }
}
