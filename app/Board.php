<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public static $rules = [
<<<<<<< HEAD
        'board_title' => 'required',
        'board_content' => 'required'
    ];
    
    protected $fillable = ['grp', 'sort', 'depth', 'member_seq', 'member_name',  'board_title', 'board_content', 'board_file1', 'board_file1_ori', 'board_file2', 'board_file2_ori'];        //인서트 할 필드들..
=======
        'title' => 'required',
        'body' => 'required'
    ];
    
    protected $fillable = ['title', 'name', 'body', 'view', 'files', 'files_ori'];        //인서트 할 필드들..
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
}
