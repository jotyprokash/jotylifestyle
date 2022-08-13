<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['title','logo','cover1','cover2','cover3','phonenumber','email','address','facebook','twitter','instagram','linkedin'];
}
