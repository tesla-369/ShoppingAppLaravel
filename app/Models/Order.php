<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable=[
        'user_id',
        'user_name',
        'email',
        'phone',
        'product_id',
        'product_name',
        'price',
        'category',
        'quantity',
        'image',
        'payement_status',
        'delivery_status',
        ];
}
