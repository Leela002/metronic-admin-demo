<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            $this->call(CategorySeeder::class),
            $this->call(ParameterSeeder::class),
            $this->call(CustomerSeeder::class)
            // PermissionsSeeder::class,
            // RolesSeeder::class,
        ]);
    }
}
