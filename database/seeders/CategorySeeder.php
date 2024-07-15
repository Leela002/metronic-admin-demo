<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Retrieve all user names
        $userNames = User::pluck('first_name')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Category::create([
                'category_name' => $faker->firstName,
                'status' => $faker->randomElement(['0', '1']),
                'created_by' => $faker->randomElement($userNames),
                'updated_by' => null,
            ]);
        }
    }
}
