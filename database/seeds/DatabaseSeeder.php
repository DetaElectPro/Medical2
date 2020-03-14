<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(EmployTableSeedr::class);
//        $this->call(MedicalFieldTableSeedr::class);
//        $this->call(UsersTableSeedr::class);
//        $this->call(MedicalSpecialtyTableSeedr::class);
        $this->call(RequestSpecialtyTableSeedr::class);
    }
}
