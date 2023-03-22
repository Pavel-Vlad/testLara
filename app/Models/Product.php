<?php

namespace App\Models;

use App\Http\Requests\CreateProductRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

}
