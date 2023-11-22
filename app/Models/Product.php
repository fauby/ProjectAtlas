<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

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
        'Image',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
