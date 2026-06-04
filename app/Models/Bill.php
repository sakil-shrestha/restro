<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
