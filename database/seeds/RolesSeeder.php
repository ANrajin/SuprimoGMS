<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name' => 'Super Admin']);
        DB::table('roles')->insert(['name' => 'Admin']);
        DB::table('roles')->insert(['name' => 'Manager']);
        DB::table('roles')->insert(['name' => 'Merchandiser']);
        DB::table('roles')->insert(['name' => 'Buyer']);
        DB::table('roles')->insert(['name' => 'Supplier']);
    }
}
