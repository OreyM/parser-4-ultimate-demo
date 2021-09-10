<?php


namespace App\Parser\Core\Data\Seeds;


use App\Core\Abstracts\Data\Seeder;
use App\Parser\Core\Models\ParcingDuration;

class TestParsedTimeSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            'total'      => 59,
            'difference' => -14,
            'isBetter'   => true
        ];

        ParcingDuration::create($data);
    }
}
