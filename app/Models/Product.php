<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
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
        // 'Image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
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
