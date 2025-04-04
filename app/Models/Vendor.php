<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    protected $fillable = [
        'user_id',
        'business_name',
        'description',
        'location',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
