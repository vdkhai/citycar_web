<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Create default admin user
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Admin',
                'email' => 'admin@citicar.com',
                'is_admin' => true,
            ];
        });
    }

    /**
     * Create default admin user
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function vdkhai()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'vdkhai',
                'email' => 'vdkhai@citicar.com',
                'is_admin' => true,
            ];
        });
    }

    /**
     * Create default admin user
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function dmdat()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'dmdat',
                'email' => 'dmdat@citicar.com',
                'is_admin' => false,
            ];
        });
    }
}
