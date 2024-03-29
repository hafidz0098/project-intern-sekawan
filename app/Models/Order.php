<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function driver(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function kendaraan(){
        return $this->belongsTo(Order::class, 'order_id');
    }


}
