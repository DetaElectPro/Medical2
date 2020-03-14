<?php

use Illuminate\Database\Seeder;

class EmployTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Employ::class, 5)->create();
    }
}
