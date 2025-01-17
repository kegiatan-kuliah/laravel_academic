<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use CrudTrait;
    protected $table = 'teachers';

    protected $fillable = [
        'name','email','phone','hire_date','department'
    ];
}
