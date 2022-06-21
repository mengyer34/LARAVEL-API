<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DateTimeInterface;

class Banana extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'status',
        'image'
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        // 'created_at' => 'datetime:l, d F Y',
        'status' => 'boolean'
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('datetime:l, d F Y');
    }
}
