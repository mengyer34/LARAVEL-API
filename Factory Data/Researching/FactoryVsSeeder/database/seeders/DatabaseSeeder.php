<?php

namespace Database\Seeders;
use App\Models\Customer;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // SEEDER 
        // $this->call(CustomerSeeder::class);

        // // FACTORY
        Customer::factory(10)->create();
        Comment::factory(10)->create();

    }
}
