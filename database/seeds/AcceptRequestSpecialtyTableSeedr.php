<?php

use Illuminate\Database\Seeder;

class AcceptRequestSpecialtyTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\AcceptRequestSpecialists::class, 5)->create();

    }
}
