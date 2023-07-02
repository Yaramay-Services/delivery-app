<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;
use App\Models\User;
use App\Models\Business;
use App\Models\MenuCategory;
use App\Models\OpeningHour;
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
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        Business::factory(10)
            ->has(Menu::factory(20))
            ->has(MenuCategory::factory(5))
            ->has(OpeningHour::factory())
            ->create();
    }
}
