<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;


class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
     * Run the database seeds.
     *
     * @return void
     */
    $items = [
        ['name'=>'pen', 'amount'=>2],
        ['name'=>'book', 'amount'=>4],
        ['name'=>'water', 'amount'=>6],
        ['name'=>'ruler', 'amount'=>3],
        ['name'=>'TV', 'amount'=>9]
    ];

    foreach($items as $item){
        Item::create($item);
    }
    }
}
