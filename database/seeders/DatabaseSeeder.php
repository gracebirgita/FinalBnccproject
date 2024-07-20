<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Toy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Category::create([
            'name' => 'Educational'
        ]);

        Category::create([
            'name' => 'Construction'
        ]);

        Category::create([
            'name' => 'Electronic'
        ]);

        Category::create([
            'name' => 'Creative'
        ]);

        Category::create([
            'name' => 'Outdoor'
        ]);

        $category_id = Category::pluck('id');
        $category_id = $category_id->toArray();

        for($i=0; $i<15; $i++){
            $randomIndex = array_rand($category_id);
            Toy::create([
                'category_id'=>$category_id[$randomIndex],
                'name' => fake()->word(),
                'description' =>fake()->paragraph(5),
                'stock'=> fake()->numberBetween(20, 2000)
            ]);
        }


    }
}
