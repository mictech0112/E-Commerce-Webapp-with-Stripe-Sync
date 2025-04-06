<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'filename',
        'is_selling',
        'is_soldout'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
