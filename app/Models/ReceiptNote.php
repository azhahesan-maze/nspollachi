<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptNote extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}