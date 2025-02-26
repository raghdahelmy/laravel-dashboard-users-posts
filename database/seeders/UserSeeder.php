<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $user = User::where('email', 'raghda.helmy82@gmail.com')->first();
            $user->role = 'admin';
            $user->save();

        }




        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'Admin@info.com',
        //     'password' => Hash::make('12345')
        // ]);
    }
