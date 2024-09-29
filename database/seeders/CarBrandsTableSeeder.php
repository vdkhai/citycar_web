<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CarBrand;

class CarBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carBrands = [
            [
                'id' => 1,
                'name' => 'BMW',
                // 'logo' => ''
            ],
            [
                'id' => 2,
                'name' => 'Ford',
                // 'logo' => ''
            ],
            [
                'id' => 3,
                'name' => 'Honda',
                // 'logo' => ''
            ],
            [
                'id' => 4,
                'name' => 'Hyundai',
                // 'logo' => ''
            ],
            [
                'id' => 5,
                'name' => 'Inokom',
                // 'logo' => ''
            ],
            [
                'id' => 6,
                'name' => 'Kia',
                // 'logo' => ''
            ],
            [
                'id' => 7,
                'name' => 'Mazda',
                // 'logo' => ''
            ],
            [
                'id' => 8,
                'name' => 'Mercedes-AMG',
                // 'logo' => ''
            ],
            [
                'id' => 9,
                'name' => 'Mercedes-Benz',
                // 'logo' => ''
            ],
            [
                'id' => 10,
                'name' => 'Mitsubishi',
                // 'logo' => ''
            ],
            [
                'id' => 11,
                'name' => 'Naza',
                // 'logo' => ''
            ],
            [
                'id' => 12,
                'name' => 'Nissan',
                // 'logo' => ''
            ],
            [
                'id' => 13,
                'name' => 'Perodua',
                // 'logo' => ''
            ],
            [
                'id' => 14,
                'name' => 'Peugeot',
                // 'logo' => ''
            ],
            [
                'id' => 15,
                'name' => 'Proton',
                // 'logo' => ''
            ],
            [
                'id' => 16,
                'name' => 'Subaru',
                // 'logo' => ''
            ],
            [
                'id' => 17,
                'name' => 'Suzuki',
                // 'logo' => ''
            ],
            [
                'id' => 18,
                'name' => 'Tesla',
                // 'logo' => ''
            ],
            [
                'id' => 19,
                'name' => 'Toyota',
                // 'logo' => ''
            ],
            [
                'id' => 20,
                'name' => 'Volkswagen',
                // 'logo' => ''
            ],
            [
                'id' => 21,
                'name' => 'Volvo',
                // 'logo' => ''
            ],
        ];

        foreach ($carBrands as $carBrand) {
            CarBrand::create($carBrand);
        }
    }
}
