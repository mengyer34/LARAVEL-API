<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Modify for accessing or storing data
    protected $fillable = [
        'name',
        'price',
    ];
}
