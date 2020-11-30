<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::create([
            'company' => 'Consumer Attorney Marketing Group',
            'title' => 'Programmer',
            'started_on' => '2020-02-01',
            'ended_on' => null,
        ]);
        Experience::create([
            'company' => 'Lamps Plus, Inc.',
            'title' => 'Programmer Analyst II',
            'started_on' => '2019-08-01',
            'ended_on' => '2020-02-01',
        ]);
        Experience::create([
            'company' => 'Lamps Plus, Inc.',
            'title' => 'Programmer Analyst I',
            'started_on' => '2018-02-01',
            'ended_on' => '2019-08-01',
        ]);
        Experience::create([
            'company' => 'Lamps Plus, Inc.',
            'title' => 'Programmer',
            'started_on' => '2017-02-01',
            'ended_on' => '2018-02-01',
        ]);
        Experience::create([
            'company' => 'Lamps Plus, Inc.',
            'title' => 'Junior Programmer',
            'started_on' => '2016-08-01',
            'ended_on' => '2017-02-01',
        ]);
        Experience::create([
            'company' => 'Bank of America',
            'title' => 'Multiple Roles',
            'started_on' => '2011-05-01',
            'ended_on' => '2016-08-01',
        ]);
    }
}
