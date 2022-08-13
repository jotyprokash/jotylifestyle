<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shippinginfo extends Model
{
	protected $fillable = ['userid','username','address','phonenumber'];

    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    use HasFactory;
}
