<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	protected $fillable = ['catname'];

    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    use HasFactory;
}
