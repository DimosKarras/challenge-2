<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'Future of Quantum Tech',
                'description' => 'A deep dive into the commercial applications of quantum computing.',
                'space_id' => 1,
                'start_date' => '2025-4-12 09:00:00',
                'end_date' => '2025-4-12 17:00:00'
            ],
            [
                'title' => 'Design Systems & UX',
                'description' => 'Exploring best practices in user interface design and scalable design systems.',
                'space' => 2,
                'start_date' => '2025-07-20 10:00:00',
                'end_date' => '2025-07-20 16:00:00',
            ],
            [
                'title' => 'Midnight Hackathon',
                'description' => 'An overnight coding competition for teams to solve real-world problems.',
                'space' => 3,
                'start_date' => '2025-11-15 20:00:00',
                'end_date' => '2025-11-16 08:00:00',
            ]
        ]);
    }
}
