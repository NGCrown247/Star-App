<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    Protected $fillable=[
        'token',
        'email',
        'plan_id',
        'token_expired_at',
        "is_verified"
    ];


    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
