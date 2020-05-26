<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //
    protected $guarded = [];

    use SoftDeletes;
    protected $date=['deleted_at'];
}
