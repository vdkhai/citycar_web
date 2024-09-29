<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->admin()->create();
        User::factory()->count(1)->vdkhai()->create();
        User::factory()->count(1)->dmdat()->create();
        User::factory()->count(10)->create();
    }
}
