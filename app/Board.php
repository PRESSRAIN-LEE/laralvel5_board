<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public static $rules = [
        'board_title' => 'required',
        'board_content' => 'required'
    ];
    
    protected $fillable = ['grp', 'sort', 'depth', 'member_seq', 'member_name',  'board_title', 'board_content', 'board_file1', 'board_file1_ori', 'board_file2', 'board_file2_ori'];        //인서트 할 필드들..
}
