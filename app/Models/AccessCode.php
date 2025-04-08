<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessCode extends Model
{
    protected $fillable=[
        'code',
        'plan_id',
        'created_by'
    ];



    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
