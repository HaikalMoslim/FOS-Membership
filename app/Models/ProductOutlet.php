<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOutlet extends Model
{
    use HasFactory;
    protected $table = 'product_outlets';
    protected $fillable = [
        'outlet_id',
        'name',
        'slug',
        'original_price',
        'selling_price',
        'image',
        'quantity',
        'tax',
        'status',
        'trending',
    ];
    
    public function location()
    {
        return $this->belongsTo(Location::class,'outlet_id','id');
    }
}
