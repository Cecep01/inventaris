<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Membuat sampe rple

         $adminRole = new Role();
         $adminRole->name = 'Admin';
         $adminRole->display_name = 'administrator';
         $adminRole->save();

        $admin = new User();
        $admin->name = 'Cecep';
        $admin->email = 'cecep@gmail.com';
        $admin->password = Hash::make('12345678');
        $admin->save();
        $admin->attachRole($adminRole);
    }
}
