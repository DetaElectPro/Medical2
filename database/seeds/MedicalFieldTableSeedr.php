<?php

use Illuminate\Database\Seeder;

class MedicalFieldTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MedicalField::class, 5)->create();

    }
}
