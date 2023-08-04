<?php

namespace Database\Seeders;

use App\Models\Words;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Words::factory()->count(20)->create();
    }
}
