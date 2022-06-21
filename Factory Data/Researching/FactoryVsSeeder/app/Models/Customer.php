<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'password'
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
