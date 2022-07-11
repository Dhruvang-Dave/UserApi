<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 5; $i++) { 
            User::create([
                'firstname' => 'Dhruvang' . $i,
                'lastname' => 'Dave'. $i,
                'username' => 'Dhruvang'. $i,
                'birthdate' => '05-04-2002',
                'email' => 'd710529'. $i .'@gmail.com',
                'phone' => 9427794460,
                'password' => '123456789'. $i,  
                'isAdmin' => 1,
            ]);
        }

        //Seeder for Country
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

        //Seeder for State
        $states = [];
        if(($open = fopen(storage_path()."/app/public/csv/states.csv" , "r")) !== FALSE)
        {
            DB::beginTransaction();
                while(($data = fgetcsv($open)) !== false){
                    $states[] = $data;
                    if(!(isset($data[0]) && $data[0] === 'id')){
                        State::create([
                            'name' => $data[1],
                            'country_id' => $data[2],
                            'country_code' => $data[3],
                            'fips_code' => $data[4],
                            'iso2' => $data[5],
                            'type' => $data[6],
                            'latitude' => $data[7],
                            'longitude' => $data[8],
                            // dd($data[7]),
                        ]);
                    }
                }
                fclose($open);
                DB::commit();
            // Commit the transaction
        }

        //Seeder for city
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

    }
}
