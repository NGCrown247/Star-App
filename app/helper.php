<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('currentUser')){
  function currentUser(){
        return Auth::user()->id;
  }
}


if(!function_exists('generateAccessCode')){
    function generateAccessCode($length =10){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomSting = '';
        for($i=0;$i<$length;$i++){
            $randomSting .= $characters[rand(0,strlen($characters)-1)];
        }
        return $randomSting;
    }
}
