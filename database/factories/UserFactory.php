<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dob = $this->faker->dateTimeBetween('1990-01-01', '2006-12-31')->format('m/d/Y');
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName($gender),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'mobile_no' => $this->faker->unique()->e164PhoneNumber(),
            'is_mobile_verified' => 1,
            'is_email_verified' => 1,
            'age' => Carbon::parse($dob)->diff(Carbon::now())->y,
            'dob' => $dob,
            'gender' => $gender,
            'address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'zip_code' => $this->faker->postcode(),
            'experience_min' => $this->faker->numberBetween($min = 0, $max = 3),
            'experience_max' => $this->faker->numberBetween($min = 4, $max = 7),
            'profile_status' => 'approved',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
