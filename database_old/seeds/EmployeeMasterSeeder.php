<?php

use Illuminate\Database\Seeder;


class EmployeeMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EmployeeMaster::class, 50)->create();
    }
}
