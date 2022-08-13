<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	protected $fillable = ['title','color','size','picture','buyingprice','sellingprice','totalquantity','brand','fabric','description','view_count','postby'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    use HasFactory;
}
