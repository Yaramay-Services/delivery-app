<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;
use App\Models\User;
use App\Models\Business;
use App\Models\MenuCategory;
use App\Models\OpeningHour;
use App\Models\VariationCategory;
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

        if (app()->environment(['local'])) {
            Business::factory(10)
                ->has(Menu::factory(10))
                ->has(MenuCategory::factory(5))
                ->has(VariationCategory::factory(5))
                ->create();

            foreach (Business::all() as $item) {
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Monday']);
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Tuesday']);
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Wednesday']);
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Thursday']);
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Friday']);
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Saturday']);
                OpeningHour::factory()->create(['business_id' => $item, 'day' => 'Sunday']);
            }

            foreach (Menu::all() as $item) {
            }
        }
    }
}
