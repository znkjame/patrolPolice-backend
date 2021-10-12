<?php

namespace Database\Seeders;

use App\Models\RedBox;
use Database\Factories\RedBoxFactory;
use Illuminate\Database\Seeder;

class RedBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RedBox::factory(10)->create();
    }
}
