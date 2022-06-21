<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'Him',
            'class' => 'WEPA',
            'age' => 20
        ],
        [
            'id' => 2,
            'name' => 'Rady',
            'class' => 'WEPB',
            'age' => 23
        ],
        [
            'id' => 3,
            'name' => 'Hyacinthe',
            'class' => 'WEPA',
            'age' => 15
        ],
        [
            'id' => 4,
            'name' => 'Ronan',
            'class' => 'WEPB',
            'age' => 20
        ]
    ];
}

