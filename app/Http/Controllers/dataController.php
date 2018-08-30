<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataController extends Controller
{
    //
    function get(){
        $score = DB::table('score')->get();
        print_r($score);
    }

    function save(){
        DB::table('score')->insert(
          ['name'=>'yifan','score'=>44,'memo'=>'hellow orld']
        );
    }
}
