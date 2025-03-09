<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidTrack extends Model
{
    

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');    
    }

    public function bidRequest()
    {
        return $this->belongsTo(BidRequest::class, 'bid_request_id');
    }
}
