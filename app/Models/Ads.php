<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $fillable = [
        'outlet_id',
        'name',
        'description',
        'image',
        'start_date',
        'end_date',
        'status',
    ];
    public function location()
    {
        return $this->belongsTo(Location::class,'outlet_id','id');
    }
}
