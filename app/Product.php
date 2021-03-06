<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    protected $guarded = [];
    use SoftDeletes;
    protected $date=['deleted_at'];

    public function category(){
        return $this->belongsToMany('App\Category');
    }
}
