<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO countries (country_name) VALUES 
        ('Bangladsh'),
        ('India'),
        ('United States'),
        ('China')
        ");
    }
}
