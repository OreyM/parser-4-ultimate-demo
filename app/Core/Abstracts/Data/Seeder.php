<?php


namespace App\Core\Abstracts\Data;


use Illuminate\Database\Seeder as LaravelSeeder;

abstract class Seeder extends LaravelSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    abstract public function run(): void;
}
