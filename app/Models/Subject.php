<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use CrudTrait;
    protected $table = 'subjects';

    protected $fillable = [
        'name','code'
    ];
}
