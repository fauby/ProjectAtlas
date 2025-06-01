<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'UserID',
        'ProductID',
        'Qty',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
