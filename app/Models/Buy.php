<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;

class Buy extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_Sale',
        'id_Product',
        'Price',
        'Amount',
    ];
}
