<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOutlet;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = [
        'name',
        'address',
        'image',
        'latitude',
        'longitude',
        'telno',
        'mobileno',
        'email',
        'operation',
        'active',
    ];

    public function productOutlet()
    {
        return $this->hasMany(ProductOutlet::class, 'outlet_id', 'id');
    }
}
