<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidRequest extends Model
{
    protected $fillable = [
        'customer_id',
        'category_id',
        'subcategory_id',
        'description',
        'target_price',
        'image',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
