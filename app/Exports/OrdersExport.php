<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    public $status;
    public function __construct($query)
    {
        $this->status = $query;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $order = new Order();
        if($this->status == Order::STATUS_PENDING){
            $order = $order->where('status',Order::STATUS_PENDING);
        }
        return $order->get();
    }
}
