<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\RoleEnum;


class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {

        $this->call(class: RoleSeeder::class);
         
    
        // User::factory(10)->create();
        User::factory()->count(10)->create();
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
        ])->syncRoles([RoleEnum::ADMIN]);

    }
}
