<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'admin' => true,
            'name' => 'Andrew Beatrice',
            'phone' => '661-236-7509',
            'email' => 'abeatrice.mail@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            TestimonialSeeder::class,
            EducationSeeder::class,
            ExperienceSeeder::class,
            BulletPointSeeder::class,
        ]);
    }
}
