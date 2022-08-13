<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = ['invoice','shippingid','userid' ,'username','address','phonenumber','email','status','paymentid','senderphonenumber','trxid','paymentmethod','totalamount','paymentamount'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
