<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Images extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'ProductID',
        'Images',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
