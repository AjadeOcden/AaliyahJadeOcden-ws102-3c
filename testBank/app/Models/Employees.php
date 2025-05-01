<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'emp_name',
        'emp_email',
        'emp_password',
    ];
}
