<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frota;

class FrotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Frota::factory()
        ->count(5)
        ->create();
    }
}
