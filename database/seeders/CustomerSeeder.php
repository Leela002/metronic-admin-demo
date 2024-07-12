<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
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
            Customer::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'contact' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'blood_group' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
                'dob' => $faker->date(),
                'created_by' => $faker->randomElement($userNames),
                'updated_by' => null,
            ]);
        }
    }
}
