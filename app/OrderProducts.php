<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProducts extends Model
{
	protected $fillable = ['shippingid','paymentid','productid','producttitle','quantity','productprice','color','size','total','picture'];

    use SoftDeletes;
 
    protected $dates = ['deleted_at'];
    use HasFactory;
}
