<?php
namespace App\Utils;
use Illuminate\Support\Str;

trait AppUtils{



    public function generateAccessCode($length){

             return Str::random($length);

    }




}