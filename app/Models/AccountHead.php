<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    public function under_data()
    {
    	return $this->belongsTo(AccountGroup::class,'under','id');
    }
}
