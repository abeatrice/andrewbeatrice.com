<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'provider' => 'ITT Technical Institute',
            'degree' => 'Bachelors of Science - Digital Entertainment and Game Design',
            'started_on' => '2005-09-01',
            'ended_on' => '2009-11-01',
        ]);
    }
}
