<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employer;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(300)->create();

        $users = User::all()->shuffle();
        for($i=0;$i<20;$i++){
            Employer::factory()->create(
                [
                    'user_id'=>$users->pop()->id,
                ]
            );
        }
        $employers = Employer::all();
        for ($i=0;$i<100;$i++){
            Opportunity::factory()->create(
                ['employer_id'=>$employers->random()->id]
            );
        }

//        foreach ($users as $user){
//            $applications = Opportunity::all();
//            $userApplications = $applications->random(rand(1,10));
//            foreach ($userApplications as $application){
//                OpportunityApplication::factory()->create(
//                    [
//                        'opportunity_id'=>$application->id,
//                        'user_id'=>$user->id,
//                    ]
//                );
//            }
//        }
        Admin::create([
            'name'=>'Ahmed Ibrahim',
            'email'=>'ahmed@gmail.com',
            'password'=>Hash::make('password')
        ]);
    }
}
