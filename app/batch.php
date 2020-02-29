<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    protected $fillable=[
        'class_id','batch_name','status','capacity',
    ];
}
