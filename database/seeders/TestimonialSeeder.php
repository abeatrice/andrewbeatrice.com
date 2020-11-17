<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'content' => "I appreciate all the work that went into this solution. Everything you have brought to our application has been leaps and bounds ahead of where it would have been otherwise. The parts of Laravel that we now use cut application development time significantly. You've done wonderfully.",
            'provider' => 'Consumer Attorney Marketing Group',
            'subprovider' => 'Tech Lead',
            'year' => '2020',
        ]);
        Testimonial::create([
            'content' => "Andrew continues to prove himself to be a top tier developer within our team and one of our go to developers as he is able to self-start the majority of his tasks and complete them with limited input from other developers. He provides excellent guidance and instruction to his fellow developers in areas of our system and coding languages where he has expertise. He is developing a greater understanding of the overall business, which enhances his ability to provide innovative solutions to the requests we receive. Andrew has become very proficient in the languages we use commonly as well as newer languages for the team like PHP.",
            'provider' => 'Lamps Plus, Inc.',
            'subprovider' => 'Performance Evaluation',
            'year' => '2019',
        ]);
        Testimonial::create([
            'content' => "Andrew has continued to perform at a high level and continues to surpass my expectations of him in the work he does. Andrew is able to get through tasks without much input and come up with innovative solutions to user and system problems. Andrew has become proficient in RPG IV, CL, PML and PHP. His knowledge and expertise in PHP is helping us to create a message handling framework for the POS system. Based on his exemplary performance, Andrew was promoted from IBM i Programmer to IBM i Programmer/Analyst I back in February of this year.",
            'provider' => 'Lamps Plus, Inc.',
            'subprovider' => 'Performance Evaluation',
            'year' => '2018',
        ]);
        Testimonial::create([
            'content' => "Andrew has become a very important member of our team over his first year at Lamps Plus. He is becoming well acquainted with most of the tools we use and is becoming more and more able to complete tasks with minimal input from other developers. He does a fine job of communicating with his fellow programmers. Andrew also works well with the users that we interact with most often. He is able to effectively take their requests and modify/create programs that reflect those expectations with little difficulty.",
            'provider' => 'Lamps Plus, Inc.',
            'subprovider' => 'Performance Evaluation',
            'year' => '2017',
        ]);
        Testimonial::create([
            'content' => "Andrew is an excellent employee and has far surpassed my expectations of him coming into our group as a Junior Programmer. He is a motivated, self-starter who is able to produce quality work in a reasonable amount of time. He is becoming well acquainted with most of the tools we use and is able to complete tasks with minimal hand holding. He has incorporated himself well with our team and has become a valuable member of our group in short order.",
            'provider' => 'Lamps Plus, Inc.',
            'subprovider' => 'Performance Evaluation',
            'year' => '2016',
        ]);
    }
}
