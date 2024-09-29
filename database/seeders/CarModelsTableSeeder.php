<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CarModel;

class CarModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModels = [
            // BMW
            [
                'title' => '1',
                'car_brand_id' => 1
            ],
            [
                'title' => '3',
                'car_brand_id' => 1
            ],
            [
                'title' => '5',
                'car_brand_id' => 1
            ],
            [
                'title' => 'X3',
                'car_brand_id' => 1
            ],
            // Ford
            [
                'title' => 'FIESTA',
                'car_brand_id' => 2
            ],
            [
                'title' => 'RANGER',
                'car_brand_id' => 2
            ],
            // Honda
            [
                'title' => 'ACCORD',
                'car_brand_id' => 3
            ],
            [
                'title' => 'BR-V',
                'car_brand_id' => 3
            ],
            [
                'title' => 'CITY',
                'car_brand_id' => 3
            ],
            [
                'title' => 'CIVIC',
                'car_brand_id' => 3
            ],
            [
                'title' => 'CR-V',
                'car_brand_id' => 3
            ],
            [
                'title' => 'CR-Z',
                'car_brand_id' => 3
            ],
            [
                'title' => 'HR-V',
                'car_brand_id' => 3
            ],
            [
                'title' => 'JAZZ',
                'car_brand_id' => 3
            ],
            // Hyundai
            [
                'title' => 'ELANTRA',
                'car_brand_id' => 4
            ],
            [
                'title' => 'GRAND STAREX',
                'car_brand_id' => 4
            ],
            // Inokom
            [
                'title' => 'ELANTRA',
                'car_brand_id' => 5
            ],
            [
                'title' => 'I10',
                'car_brand_id' => 5
            ],
            [
                'title' => 'SANTA FE',
                'car_brand_id' => 5
            ],
            // Kia
            [
                'title' => 'CERATO',
                'car_brand_id' => 6
            ],
            [
                'title' => 'PICANTO',
                'car_brand_id' => 6
            ],
            [
                'title' => 'RIO',
                'car_brand_id' => 6
            ],
            [
                'title' => 'SPORTAGE',
                'car_brand_id' => 6
            ],
            // Mazda
            [
                'title' => '2',
                'car_brand_id' => 7
            ],
            [
                'title' => '3',
                'car_brand_id' => 7
            ],
            [
                'title' => 'CX-3',
                'car_brand_id' => 7
            ],
            [
                'title' => 'CX-5',
                'car_brand_id' => 7
            ],
            [
                'title' => 'CX-9',
                'car_brand_id' => 7
            ],
            // Mercedes-AMG
            [
                'title' => 'GLE',
                'car_brand_id' => 8
            ],
            // Mercedes-Benz
            [
                'title' => 'A',
                'car_brand_id' => 9
            ],
            [
                'title' => 'B',
                'car_brand_id' => 9
            ],
            [
                'title' => 'C',
                'car_brand_id' => 9
            ],
            [
                'title' => 'GLC',
                'car_brand_id' => 9
            ],
            // Mitsubishi
            [
                'title' => 'ASX',
                'car_brand_id' => 10
            ],
            [
                'title' => 'MIRAGE',
                'car_brand_id' => 10
            ],
            [
                'title' => 'OUTLANDER',
                'car_brand_id' => 10
            ],
            [
                'title' => 'TRITON',
                'car_brand_id' => 10
            ],

            // Naza
            [
                'title' => 'FORTE',
                'car_brand_id' => 11
            ],
            // Nissan
            [
                'title' => 'ALMERA',
                'car_brand_id' => 12
            ],
            [
                'title' => 'GRAND LIVINA',
                'car_brand_id' => 12
            ],
            [
                'title' => 'NAVARA',
                'car_brand_id' => 12
            ],
            [
                'title' => 'NV200',
                'car_brand_id' => 12
            ],
            [
                'title' => 'SENTRA',
                'car_brand_id' => 12
            ],
            [
                'title' => 'SERENA',
                'car_brand_id' => 12
            ],
            [
                'title' => 'SYLPHY',
                'car_brand_id' => 12
            ],
            [
                'title' => 'X-TRAIL',
                'car_brand_id' => 12
            ],
            // Perodua
            [
                'title' => 'ALZA',
                'car_brand_id' => 13
            ],
            [
                'title' => 'ARUZ',
                'car_brand_id' => 13
            ],
            [
                'title' => 'ATIVA',
                'car_brand_id' => 13
            ],
            [
                'title' => 'AXIA',
                'car_brand_id' => 13
            ],
            [
                'title' => 'BEZZA',
                'car_brand_id' => 13
            ],
            [
                'title' => 'MYVI',
                'car_brand_id' => 13
            ],
            [
                'title' => 'VIVA',
                'car_brand_id' => 13
            ],
            // Peugeot
            [
                'title' => '208',
                'car_brand_id' => 14
            ],
            [
                'title' => '3008',
                'car_brand_id' => 14
            ],
            // Proton
            [
                'title' => 'EXORA',
                'car_brand_id' => 15
            ],
            [
                'title' => 'IRIZ',
                'car_brand_id' => 15
            ],
            [
                'title' => 'PERDANA',
                'car_brand_id' => 15
            ],
            [
                'title' => 'PERSONA',
                'car_brand_id' => 15
            ],
            [
                'title' => 'PREVE',
                'car_brand_id' => 15
            ],
            [
                'title' => 'SAGA',
                'car_brand_id' => 15
            ],
            [
                'title' => 'SUPRIMA S',
                'car_brand_id' => 15
            ],
            [
                'title' => 'X70',
                'car_brand_id' => 15
            ],
            // Subaru
            [
                'title' => 'FORESTER',
                'car_brand_id' => 16
            ],
            [
                'title' => 'XV',
                'car_brand_id' => 16
            ],
            // Suzuki
            [
                'title' => 'SWIFT',
                'car_brand_id' => 17
            ],
            // Tesla
            [
                'title' => 'MODEL 3',
                'car_brand_id' => 18
            ],
            // Toyota
            [
                'title' => 'AVANZA',
                'car_brand_id' => 19
            ],
            [
                'title' => 'C-HR',
                'car_brand_id' => 19
            ],
            [
                'title' => 'CAMRY',
                'car_brand_id' => 19
            ],
            [
                'title' => 'COROLLA',
                'car_brand_id' => 19
            ],
            [
                'title' => 'ESTIMA',
                'car_brand_id' => 19
            ],
            [
                'title' => 'FORTUNER',
                'car_brand_id' => 19
            ],
            [
                'title' => 'HARRIER',
                'car_brand_id' => 19
            ],
            [
                'title' => 'HILUX',
                'car_brand_id' => 19
            ],
            [
                'title' => 'INNOVA',
                'car_brand_id' => 19
            ],
            [
                'title' => 'PREVIA',
                'car_brand_id' => 19
            ],
            [
                'title' => 'PRIUS',
                'car_brand_id' => 19
            ],
            [
                'title' => 'RUSH',
                'car_brand_id' => 19
            ],
            [
                'title' => 'SIENTA',
                'car_brand_id' => 19
            ],
            [
                'title' => 'VELLFIRE',
                'car_brand_id' => 19
            ],
            [
                'title' => 'VIOS',
                'car_brand_id' => 19
            ],
            [
                'title' => 'WISH',
                'car_brand_id' => 19
            ],
            [
                'title' => 'YARIS',
                'car_brand_id' => 19
            ],
            // Volkswagen
            [
                'title' => 'PASSAT',
                'car_brand_id' => 20
            ],
            [
                'title' => 'POLO',
                'car_brand_id' => 20
            ],
            [
                'title' => 'SHARAN',
                'car_brand_id' => 20
            ],
            [
                'title' => 'TIGUAN',
                'car_brand_id' => 20
            ],
            [
                'title' => 'VENTO',
                'car_brand_id' => 20
            ],
            // Volvo
            [
                'title' => 'V40',
                'car_brand_id' => 21
            ],
        ];

        foreach ($carModels as $carModel) {
            CarModel::create($carModel);
        }
    }
}
