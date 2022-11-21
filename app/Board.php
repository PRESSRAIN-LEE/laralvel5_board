<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['title', 'name', 'body', 'view'];        //인서트 할 필드들..
}
