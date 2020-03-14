<?php

use Illuminate\Database\Seeder;

class MedicalSpecialtyTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Employ::class, 25)->create();

    }
}
