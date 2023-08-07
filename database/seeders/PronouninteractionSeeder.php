<?php

namespace Database\Seeders;

use App\Models\Pronouninteraction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PronouninteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pronouninteraction::factory()->count(10)->create();
    }
}
