<?php

namespace Database\Seeders;

use App\Models\Police;
use Illuminate\Database\Seeder;

class PoliceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Police::factory(10)->hasUser(1)->create();
    }
}
