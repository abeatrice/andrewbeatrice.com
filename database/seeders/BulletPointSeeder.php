<?php

namespace Database\Seeders;

use App\Models\BulletPoint;
use App\Models\Experience;
use Illuminate\Database\Seeder;

class BulletPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camgProgrammer = Experience::where('company', 'Consumer Attorney Marketing Group')->where('title', 'Programmer')->first();
        $camgProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => 'Created QA environments with docker and bash scripts to facilitate quality assurance testing.'
        ]));
        $camgProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 2,
            'content' => 'Added role based access control to primary web application letting management have granular control over read, write, and update access to specific resources.'
        ]));
        $camgProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 3,
            'content' => 'Modernized legacy application with the addition of PSR-4 autoloading and a variety of packagist libraries to expedite development.'
        ]));
        $camgProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 4,
            'content' => 'Created and facilitated developer training on subjects: Git, Docker, Laravel packages, Redis, and more.'
        ]));

        
    }
}
