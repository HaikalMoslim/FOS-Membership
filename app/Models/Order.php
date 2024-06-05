<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable =[
        'user_id',
        'total_price',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'postalcode',
        'status',
        'message',
        'payment_mode',
        'payment_id',
        'tracking_no',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
