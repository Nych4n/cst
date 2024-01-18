<?php

namespace Database\Seeders;

use App\Models\CoreOffice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoreOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CoreOffice::factory()->count(5)->create();
    }
}
