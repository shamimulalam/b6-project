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

    const PAYMENT_STATUS_PAID = 'Paid';
    const PAYMENT_STATUS_UNPAID = 'Unpaid';

    const PAYMENT_METHOD_CARD = 'card';
    const PAYMENT_METHOD_COD = 'cod';
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
