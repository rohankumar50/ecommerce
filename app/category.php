<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    protected $guarded = [];
    use SoftDeletes;
    protected $date=['deleted_at'];

    public function product(){
        return $this->belongsToMany('App\Product');
    }

    public function children(){
        return $this->belongsToMany('App\Category','category_parent','category_id','parent_id');
    }
}
