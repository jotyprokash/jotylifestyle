<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    protected $fillable = ['shippingid', 'senderphonenumber','trxid','paymentmethod'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
