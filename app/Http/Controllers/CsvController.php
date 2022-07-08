<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\CountryImport;
use Illuminate\vendor\maatwebsite\excel;
use App\Models\City;
use Illuminate\Support\Facades\DB;


class CsvController extends Controller
{
    public function importForm(){

        $cities = [];
        if(($open = fopen(storage_path()."/app/public/csv/cities.csv", "r")) !== FALSE)
        {
             // Begin a transaction
                // DB::beginTransaction();
            while(($data = fgetcsv($open)) !== FALSE){
                $cities = $data;
                
                if(!(isset($data[0]) && $data[0] === 'id')){
                    // dd($data);
                    City::create([
                        'name' => $data[1],
                        'state_id' => $data[2],
                        'state_code' => $data[3],
                        // 'state_name' => $data[4],
                        'country_id' => $data[5],
                        'country_code' => $data[6],
                        'latitude' => $data[8],
                        'longitude' => $data[9],
                        // 'country_name' => $data[7],   
                    ]);    
                }    
            }
            fclose($open);
            // Commit the transaction
    // DB::commit();
        }

        echo "<pre>";
        print_r($cities);

        // $open = fopen();
        // $countries = get_file_contents($storage_path()."/csv/cities.csv");

        // $attributes = file('thumbnail');
        // $path = storage_path("app/public/csv/cities.csv");
        // dd(file_get_contents($path));

        return view('import-form');
    }

    public function import(Request $request){
        Excel::import(new CountryImport, $request->file);
        return "Record imported Successfully!";
    }
}
