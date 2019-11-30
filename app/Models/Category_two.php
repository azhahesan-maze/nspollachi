<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_two extends Model
{
    use SoftDeletes;
    public function category_one(){
        return $this->belongsTo(Category_one::class,'category_one_id','id');
    }

    public function category_threes()
    {
        return $this->hasmany(Category_three::class);

    }
}
