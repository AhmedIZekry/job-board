<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalUsers = 100;
        for ($i = 0; $i < $totalUsers; $i++) {
            if(fake()->boolean(20)){
                User::factory()->withRole('employer')->create();
            }else{
                User::factory()->create();
            }
        }


    }
}
