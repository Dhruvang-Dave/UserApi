<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\CountryImport;
use Illuminate\vendor\maatwebsite\excel;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;


class CsvController extends Controller
{
    public function importForm(){

        $countries = [];
        if(($open = fopen(storage_path()."/app/public/csv/countries.csv" , "r")) !== FALSE)
        {
            DB::beginTransaction();
                while(($data = fgetcsv($open)) !== false){
                    $countries[] = $data;
                    if(!(isset($data[0]) && $data[0] === 'id')){
                        // dd($data[0]);
                        Country::create([
                            'name'  => $data[1],
                            'iso3'  => $data[2],
                            'iso2'  => $data[3],
                            'numeric_code'  => $data[4],
                            'phonecode'  => $data[5],
                            'capital'  => $data[6],
                            'currency'  => $data[7],
                            'currency_name'  => $data[8],
                            'currency_symbol'  => $data[9],
                            'tld'  => $data[10],
                            'native'  => $data[11],
                            'region'  => $data[12],
                            'subregion'  => $data[13],
                            'timezones'  => $data[14],
                            'latitude'  => $data[15],
                            'longitude'  => $data[16],
                            'emoji'  => $data[17],
                            'emojiU'  => $data[18]
                        ]);
                    }
                }
                fclose($open);
                DB::commit();
            // Commit the transaction
        }

        echo "<pre>";
        print_r($countries);

        // $open = fopen();
        // $countries = get_file_contents($storage_path()."/csv/cities.csv");

        // $attributes = file('thumbnail');
        // $path = storage_path("app/public/csv/cities.csv");
        // dd(file_get_contents($path));

        // return view('import-form');
    }

    public function import(Request $request){
        Excel::import(new CountryImport, $request->file);
        return "Record imported Successfully!";
    }
}
