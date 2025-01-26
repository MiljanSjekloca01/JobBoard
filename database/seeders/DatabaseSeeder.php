<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $users = User::factory(100)->create();
        
        $users = User::all()->shuffle();

        for($i = 0; $i < 25; $i++){
            Employer::factory()->create([
                "user_id" => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for($i = 0; $i < 100; $i++){
            Job::factory()->create([
                "employer_id" => $employers->random()->id
            ]);
        }
    }

    /*
        Probably better solution but little diffrent outcome on Employer-jobs

        $users = User::factory(100)->create();
        $emmployers = Employer::factory(50)->recycle($users)->create();
        Job::factory(100)->recycle($emmployers)->create();
    */ 
}
