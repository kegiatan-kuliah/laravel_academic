<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;
    protected $table = 'students';

    protected $fillable = [
        'name','email','phone','address','enrollment_date'
    ];
}
