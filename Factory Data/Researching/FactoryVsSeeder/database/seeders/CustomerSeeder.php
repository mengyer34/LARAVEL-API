<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i = 0; $i < 10; $i++){
        //     DB::table('customers')->insert(
        //         [
        //             'name' => Str::random(10),
        //             'password' => Hash::make('password'),
        //         ]
        //     );
        // }


        DB::table('customers')->insert(
            [
                'name' => 'Mengyi',
                'password' => Hash::make('password'),
            ]
        );
    }
}
