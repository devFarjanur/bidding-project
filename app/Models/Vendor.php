<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{





    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }
}
