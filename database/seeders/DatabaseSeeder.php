<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CarPostsTableSeeder;
use Database\Seeders\CarBrandsTableSeeder;
use Database\Seeders\CarModelsTableSeeder;
use Database\Seeders\ImagesTableSeeder;

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
        $this->call([
            CarBrandsTableSeeder::class,
            CarModelsTableSeeder::class,
            UsersTableSeeder::class,
            CarPostsTableSeeder::class,
            ImagesTableSeeder::class,
        ]);
    }
}
