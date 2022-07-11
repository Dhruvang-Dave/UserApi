<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\vendor\maatwebsite\excel;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
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
}

}

// $countries = [];
//         if(($open = fopen(storage_path()."/app/public/csv/countries.csv" , "r")) !== FALSE)
//         {
//             DB::beginTransaction();
//                 while(($data = fgetcsv($open)) !== false){
//                     $countries[] = $data;
//                     if(!(isset($data[0]) && $data[0] === 'id')){
//                         // dd($data[0]);
//                         Country::create([
//                             'name'  => $data[1],
//                             'iso3'  => $data[2],
//                             'iso2'  => $data[3],
//                             'numeric_code'  => $data[4],
//                             'phonecode'  => $data[5],
//                             'capital'  => $data[6],
//                             'currency'  => $data[7],
//                             'currency_name'  => $data[8],
//                             'currency_symbol'  => $data[9],
//                             'tld'  => $data[10],
//                             'native'  => $data[11],
//                             'region'  => $data[12],
//                             'subregion'  => $data[13],
//                             'timezones'  => $data[14],
//                             'latitude'  => $data[15],
//                             'longitude'  => $data[16],
//                             'emoji'  => $data[17],
//                             'emojiU'  => $data[18]
//                         ]);
//                     }
//                 }
//                 fclose($open);
//                 DB::commit();
//             // Commit the transaction
//         }

//         echo "<pre>";
//         print_r($countries);