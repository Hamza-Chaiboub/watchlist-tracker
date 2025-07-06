<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            ['name' => 'Movie'],
            ['name' => 'Series'],
            ['name' => 'Documentary'],
            ['name' => 'Anime'],
            ['name' => 'Cartoon'],
            ['name' => 'Music Video'],
            ['name' => 'Short Film'],
            ['name' => 'Podcast'],
            ['name' => 'Live Stream'],
            ['name' => 'News'],
            ['name' => 'Educational'],
            ['name' => 'Gaming'],
            ['name' => 'Sports'],
            ['name' => 'Reality Show'],
            ['name' => 'Talk Show']
        ]);
    }
}
