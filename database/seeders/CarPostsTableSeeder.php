<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CarPost;
use App\Models\CarModel;

class CarPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModels = CarModel::all();
        CarPost::factory()->count(101)->make()->each(function($post) use ($carModels) {
            $post['user_id'] = rand(1, 3);
            $post['car_model_id'] = $carModels->random()['id'];
            $post->save();
        });
    }
}
