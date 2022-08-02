<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\admin::factory(2)->create();
    }
}
