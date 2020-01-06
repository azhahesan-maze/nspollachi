<?php

namespace App\Models;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function category_one()
    {
        return $this->belongsTo(Category_one::class, 'category_1', 'id');
    }

    public function category_two()
    {
        return $this->belongsTo(Category_two::class, 'category_2', 'id');
    }

    public function category_three()
    {
        return $this->belongsTo(Category_three::class, 'category_3', 'id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }

    public function bulk_item()
    {
        return $this->belongsTo(Item::class, 'bulk_item_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
