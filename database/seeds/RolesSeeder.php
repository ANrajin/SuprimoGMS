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
        DB::table('roles')->insert(['role' => 'Super Admin']);
        DB::table('roles')->insert(['role' => 'Admin']);
        DB::table('roles')->insert(['role' => 'Manager']);
        DB::table('roles')->insert(['role' => 'Merchandiser']);
        DB::table('roles')->insert(['role' => 'Buyer']);
        DB::table('roles')->insert(['role' => 'Supplier']);
    }
}
