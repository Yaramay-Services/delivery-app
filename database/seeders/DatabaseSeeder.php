<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;
use App\Models\User;
use App\Models\Business;
use App\Models\MenuCategory;
use App\Models\MenuVariation;
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

            foreach (Business::all() as $cnt => $business) {
                foreach ($business->menu as $key => $menu) {
                    $parentVariation = VariationCategory::factory()
                        ->has(MenuVariation::factory(5)->state(['business_id' => $business->id]))
                        ->create([
                            'business_id' => $business->id,
                            'menu_id' => $menu->id,
                        ]);
                    foreach ($parentVariation->menuVariation as $variation) {
                        VariationCategory::factory(5)
                            ->has(MenuVariation::factory(5)->state(['business_id' => $business->id]))
                            ->create([
                                'business_id' => $business->id,
                                'menu_id' => $menu->id,
                                'menu_variation_id' => $variation->id
                            ]);
                    }
                }
            }
        }
    }
}
