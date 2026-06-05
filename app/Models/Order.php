<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'table_id',
        'customer_id',
        'waiter_id',
        'status',
        'notes',

    ];
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function waiter()
    {
        return $this->belongsTo(User::class,'waiter_id');
    }

    public function orderItems()
    {
        return $this->hasMany(orderItem::class);
    }


    // public function menuItems()
    // {
    //     return $this->belongsToMany(MenuItem::class)->withPivot('quantity');
    // }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }
}
