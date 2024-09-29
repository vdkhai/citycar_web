<?php

namespace Database\Factories;

use App\Models\CarPost;
use App\Enums\CarBodyType;
use App\Enums\CarFuelType;
use App\Enums\CarColor;
use App\Enums\CarSeat;
use App\Enums\CarRegistrationType;
use App\Enums\CarTransmission;
use App\Enums\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $principal_warranty = $this->faker->boolean();
        $principal_warranty_exp_date = null;

        if ($principal_warranty === true) {
            $principal_warranty_exp_date = $this->faker->dateTimeBetween('now', '+10 years')->format('d/m/Y');
        }

        $identify_letter = $this->faker->toUpper($this->faker->randomLetter());
        $identify_digit = '';

        for ($i = 0; $i < 6; $i++) {
            $identify_digit .= $this->faker->randomDigitNotNull();
        }

        $identify = $identify_letter . $identify_digit;

        return [
            // Product info
            'identify' => $identify,
            'title' => $this->faker->text(100),
            'price' => $this->faker->numberBetween(100000, 10000000),
            'currency' => 'VND',
            'transmission' => CarTransmission::getRandomValue(),
            'body_type' => CarBodyType::getRandomValue(),
            'fuel_type' => CarFuelType::getRandomValue(),
            'current_color' => CarColor::getRandomValue(),
            'seat' => CarSeat::getRandomValue(),
            'state' => State::getRandomValue(),
            // Post info
            'registration_date' => $this->faker->dateTimeBetween('-10 years', 'now')->format('d/m/Y'),
            'registration_type' => CarRegistrationType::getRandomValue(),
            'current_mileage' => $this->faker->numberBetween(0, 100000),
            'spare_key' => $this->faker->boolean(),
            'principal_warranty' => $principal_warranty,
            'principal_warranty_exp_date' => $principal_warranty_exp_date,
            'service_book' => $this->faker->boolean(),
            // Foreign key
            // 'user_id' => 1,
            // 'car_model_id' => 1,
        ];
    }
}
