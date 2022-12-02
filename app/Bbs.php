<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    protected $table = "reply_boards";
    protected $primaryKey = 'id';
    public $incrementing = false;
    //protected $keyType = 'string';
}
