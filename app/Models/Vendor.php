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

    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }
}
