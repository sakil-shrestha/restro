<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleAndPermissionSeeder::class);

       $superAdmin=User::create([
        'name'=>'Super Admin',
        'email'=>"superadmin@restro.com",
        'password'=>'superadmin123',
       ]);
       $superAdmin->assignRole('Admin');


    }
}
