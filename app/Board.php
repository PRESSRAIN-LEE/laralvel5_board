<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public static $rules = [
        'title' => 'required',
        'body' => 'required'
    ];
    
    protected $fillable = ['title', 'name', 'body', 'view', 'files', 'files_ori'];        //인서트 할 필드들..
}
