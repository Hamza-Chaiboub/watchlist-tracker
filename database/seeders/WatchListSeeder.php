<?php

namespace Database\Seeders;

use App\Models\WatchList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WatchListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WatchList::factory()
            ->count(1000)
            ->create();
    }
}
