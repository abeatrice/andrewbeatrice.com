<?php

namespace Database\Seeders;

use App\Models\BulletPoint;
use App\Models\Education;
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

        $lampsProgrammerAnalystII = Experience::where('company', 'Lamps Plus, Inc.')->where('title', 'Programmer Analyst II')->first();
        $lampsProgrammerAnalystII->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Developed a web app for store personnel to order expense items from the company's warehouse using laravel, bootstrap, and jQuery."
        ]));

        $lampsProgrammerAnalystI = Experience::where('company', 'Lamps Plus, Inc.')->where('title', 'Programmer Analyst I')->first();
        $lampsProgrammerAnalystI->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Developed a web app with laravel, Vue.js and sql that provides order metrics in charts and tables. The application monitors orders through each stage of order processing and has effectively identified issues with orders and alerted the appropriate departments."
        ]));
        $lampsProgrammerAnalystI->bulletPoints()->save(new BulletPoint([
            'order' => 2,
            'content' => "Developed web app in php and jQuery for store personnel to disposition all customer returns and decide if a return should be accepted."
        ]));

        $lampsProgrammer = Experience::where('company', 'Lamps Plus, Inc.')->where('title', 'Programmer')->first();
        $lampsProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Developed php (Symfony) console application that creates a table driven queue service. The service provides developers a means to drop messages into a table and it will automatically be sent to amazon web service’s simple queue service or listen for messages on aws sqs and store them in local tables."
        ]));
        $lampsProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 2,
            'content' => "Developed Symfony application that acts as an adapter for translating json data from all point of sale transactions into xml that is used by sales audit software."
        ]));
        $lampsProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 3,
            'content' => "Developed batch process in ILE RPG that reviews all Lamps Plus products nightly and determines if it should be listed on online marketplaces such as walmart or ebay."
        ]));
        $lampsProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 4,
            'content' => "Developed php and bootstrap web app to provide buying department gross margin calculations on products listed on online marketplaces."
        ]));

        $lampsJuniorProgrammer = Experience::where('company', 'Lamps Plus, Inc.')->where('title', 'Junior Programmer')->first();
        $lampsJuniorProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Developed a php and javascript web application for the buying department to create kit products from other existing products as components."
        ]));
        $lampsJuniorProgrammer->bulletPoints()->save(new BulletPoint([
            'order' => 2,
            'content' => "Debugged and modified ILE RPG programs to fix and add features to existing processes."
        ]));

        $bac = Experience::where('company', 'Bank of America')->where('title', 'Multiple Roles')->first();
        $bac->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Team Manager: Managed ~15 direct reports."
        ]));
        $bac->bulletPoints()->save(new BulletPoint([
            'order' => 2,
            'content' => "Process Support: Designed and facilitated training for ~90 associates."
        ]));
        $bac->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Media Researcher: Provided media relations and executive management recommendation of action in response to media inquiries."
        ]));
        
        $ittTech = Education::where('provider', 'ITT Technical Institute')->first();
        $ittTech->bulletPoints()->save(new BulletPoint([
            'order' => 1,
            'content' => "Developed a game engine in C++ with user input, graphics rendering, and collision detection/correction."
        ]));

    }
}
