<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'address' => 'Indefinida',
            'email' => 'admin@admin.com',
            'username' => 'Admin',
            'phonenumber' => '3136915874',
            'password' => bcrypt('root'),
        ]);

        $user->assignRole('Admin');

        $normal = User::create([
            'address' => 'Barrio La Fachada Mz 35 # 5',
            'email' => 'afescobarv@uqvirtual.edu.co',
            'username' => 'Andres Escobar',
            'phonenumber' => '3005293555',
            'password' => bcrypt('1234'),
        ]);

        $normal->assignRole('User');
    }
}
