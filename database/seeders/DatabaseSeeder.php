<?php

namespace Database\Seeders;

use App\Models\Joblisting;
use Faker\Factory as FakerFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        Joblisting::factory(20)->create();
        
    }
}
