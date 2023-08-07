<?php

namespace Database\Seeders;

use App\Models\Pronounpage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PronounpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pronounpage::factory()->count(10)->create();
    }
}
