<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO cities (country_id, city_name) VALUES 
        ('1', 'Dhaka'),
        ('1', 'Chittagong'),
        ('1', 'Rajshahi'),
        ('1', 'Barishal'),
        ('1', 'Khulna'),
        ('1', 'Sylhet'),
        ('2', 'Delhi'),
        ('2', 'Kolkata'),
        ('2', 'Mumbai'),
        ('2', 'Punjab'),
        ('2', 'Rajsthan'),
        ('2', 'Pune'),
        ('3', 'New York'),
        ('3', 'Los Angeles'),
        ('3', 'Chicago'),
        ('3', 'Houston'),
        ('3', 'San Antonio'),
        ('3', 'Dallas'),
        ('3', 'El Paso'),
        ('3', 'Tucson'),
        ('3', 'San Francisco')
        ");
    }
}
