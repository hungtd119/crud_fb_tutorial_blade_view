<?php

namespace Database\Seeders;

use App\Models\Pronouns;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PronounSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pronouns::factory()->count(50)->create();
    }
}
