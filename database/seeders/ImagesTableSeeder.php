<?php

namespace Database\Seeders;

use App\Models\CarPost;
use Illuminate\Database\Seeder;

use App\Models\Image;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Brand logos
        $images = [
            [
                'imageable_id' => 1,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/BMW_1.png',
            ],
            [
                'imageable_id' => 2,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Ford_2.png',
            ],
            [
                'imageable_id' => 3,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Honda_3.png',
            ],
            [
                'imageable_id' => 4,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Hyundai_4.png',
            ],
            [
                'imageable_id' => 5,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Inokom_5.png',
            ],
            [
                'imageable_id' => 6,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Kia_6.png',
            ],
            [
                'imageable_id' => 7,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Mazda_7.png',
            ],
            [
                'imageable_id' => 8,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Mercedes-AMG_8.png',
            ],
            [
                'imageable_id' => 9,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Mercedes-Benz_9.png',
            ],
            [
                'imageable_id' => 10,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Mitsubishi_10.png',
            ],
            [
                'imageable_id' => 11,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Naza_11.png',
            ],
            [
                'imageable_id' => 12,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Nissan_12.png',
            ],
            [
                'imageable_id' => 13,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Perodua_13.png',
            ],
            [
                'imageable_id' => 14,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Peugeot_14.png',
            ],
            [
                'imageable_id' => 15,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Proton_15.png',
            ],
            [
                'imageable_id' => 16,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Subaru_16.png',
            ],
            [
                'imageable_id' => 17,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Suzuki_17.png',
            ],
            [
                'imageable_id' => 18,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Tesla_18.png',
            ],
            [
                'imageable_id' => 19,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Toyota_19.png',
            ],
            [
                'imageable_id' => 20,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Volkswagen_20.png',
            ],
            [
                'imageable_id' => 21,
                'imageable_type' => 'App\Models\CarBrand',
                'path' => 'brand/logos/Volvo_21.png',
            ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }

        // DB::enableQueryLog();

        // Post photos
        $carPostIds = CarPost::pluck('id');
        $files = Storage::allFiles('sample');
        $images = [];

        foreach ($carPostIds as $id) {
            $numberOfImages = rand(1, 10);
            for ($i = 0; $i < $numberOfImages; $i++) {
                $images[] = [
                    'imageable_type' => 'App\Models\CarPost',
                    'imageable_id' => $id,
                    'path' => $files[rand(0, count($files) - 1)],
                ];
            }
        }

        foreach ($images as $image) {
            Image::create($image);
        }

        // dd(DB::getQueryLog());
    }
}
