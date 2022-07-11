<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $table = 'states';

    public $fillable = ['id','name','country_id','country_code','fips_code','iso2','type','latitude','longitude'];

}
