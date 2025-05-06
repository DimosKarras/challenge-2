<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spaces')->insert([
            [
                'name' => 'Quantum Hall'
            ],
            [
                'name' => 'Echo Chamber'
            ],
            [
                'name' => 'Studio 404'
            ],
            [
                'name' => 'Skylight Lounge'
            ]
        ]);
    }
}
