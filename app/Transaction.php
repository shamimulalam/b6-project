<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const STATUS_PENDING = 'Pending';
    const STATUS_SUCCESS = 'Success';
    const STATUS_FAILED = 'Failed';
    const STATUS_CANCELLED = 'Cancelled';
}
