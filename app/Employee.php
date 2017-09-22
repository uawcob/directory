<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $hidden = [
        'emp_id',
        'isisid',
    ];
}
