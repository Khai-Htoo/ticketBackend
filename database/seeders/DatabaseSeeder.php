<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'role' => 'staff',
            'password' => Hash::make('password'),
        ]);

        $category = ['Yangon To Mandalay', 'Yangon To Bagan', 'Yangon To TaungGyi'];
        foreach ($category as $c) {
            Category::create([
                'name' => $c,
            ]);
        }
    }
}
