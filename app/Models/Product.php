<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Images;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'SellerID',
        'Title',
        'Description',
        'Price',
        'Category',
        'Condition',
        'Stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'id');
    }

}
