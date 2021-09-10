<?php

namespace Database\Seeders;

use App\Backend\Auth\Data\Seeds\LaravelPassportSeeder;
use App\Cabinet\Documents\Data\Seeds\DocumentTypesSeeder;
use App\Parser\ParserCore\Data\Seeds\TestParsedTimeSeeder;
use App\Parser\ParserCore\Data\Seeds\TestGamesDataSeeder;
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
        // Parser
        $this->call(TestParsedTimeSeeder::class);
    }
}
