<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING    = 'Pending';
    const STATUS_PROCESSING = 'Processing';
    const STATUS_SHIPPED    = 'Shipped';
    const STATUS_DELIVERED  = 'Delivered';
    const STATUS_CANCELLED  = 'Cancelled';
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
