<?php

namespace App\Imports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CountryImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Country([

            'id' => $row['id'],
            'name' => $row['name'],
            'iso3' => $row['iso3'],
            'iso2' => $row['namiso2e'],
            'numeric_code' => $row['numeric_code'],
            'phone_code' => $row['phone_code'],
            'capital' => $row['capital'],
            'currency' => $row['currency'],
            'currency_name' => $row['currency_name'],
            'currency_symbol' => $row['currency_symbol'],
            'tld' => $row['tld'],
            'native' => $row['native'],
            'region' => $row['region'],
            'subregion' => $row['subregion'],
            'timezones' => $row['timezones'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'emoji' => $row['emoji'],
            'emojiU' => $row['emojiU'],
        ]);
    }
}
