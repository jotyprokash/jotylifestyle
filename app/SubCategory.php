<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
	protected $fillable = ['subcatname','catname'];

    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    use HasFactory;
}
