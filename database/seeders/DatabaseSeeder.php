<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
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
        // \App\Models\User::factory(10)->create();

        // insert admin
        User::create([
            'id' => Uuid::uuid4(), // Generate a UUID
            'name' => 'Admin',
            'email' => 'admin_mustaphie@example.com',
            'password' => Hash::make('admin123'),
            'is_admin'=> 1,
        ]);

        // insert guest
        User::create([
            'id' => Uuid::uuid4(), // Generate a UUID
            'name' => 'Mustaphie',
            'email' => 'mtpha53@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        // insert guest
        /* DB::table('users')->insert([
            'id' => Uuid::uuid4(), // Generate a UUID
            'name' => 'Mustaphie',
            'email' => 'mtpha53@gmail.com',
            'password' => Hash::make('12345678'),
        ]); */


    }
}
