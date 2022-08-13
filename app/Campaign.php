<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
	protected $fillable = ['title','color','size','picture','campaignprice','sellingprice','totalquantity','brand','fabric','description'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    use HasFactory; 
}
