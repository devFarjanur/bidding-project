<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{

    protected $fillable = [
        'vendor_id',
        'bid_request_id',
        'proposed_price',
        'status'
    ];


    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function bidRequest()
    {
        return $this->belongsTo(BidRequest::class, 'bid_request_id');
    }
}
