<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Buy;

class Sale extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_User',
        'Total_Price',
    ];

}
