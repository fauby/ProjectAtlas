<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'CatName',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'Category', 'id');
    }

}
