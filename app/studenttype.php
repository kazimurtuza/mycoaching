<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studenttype extends Model
{
    protected $fillable=[
        'class_id','student_type','status'
    ];
}
