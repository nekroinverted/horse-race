<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::truncate(); //deletes the data from the table when running the seeder
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}
