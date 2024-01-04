<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->bangladeshiPhoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'position' => fake()->randomElement(['Laravel Developer', 'React Developer', 'Node Developer', 'Flutter Developer', 'Project Manager', 'Sales Manager', 'Accountant']),
            'address' => $this->bangladeshiAddress(),
        ];
    }

    public function bangladeshiPhoneNumber()
    {
        // Bangladeshi phone numbers usually start with +880 and have 11 digits.
        return '+8801' . mt_rand(3, 9) . mt_rand(10000000, 99999999);
    }

    public function bangladeshiAddress()
    {
        $districts = [
            'Dhaka'
        ];

        $areas = [
            'Badda', 'Banani', 'Mirpur', 'Gulshan', 'Uttara', 'Baridhara',
        ];

        $streets = [
            'Road 1', 'Road 2', 'Road 3', 'Lane 1', 'Lane 2', 'Lane 3', 'Street 1', 'Street 2', 'Avenue 1', 'Avenue 2'
        ];

        $district = $this->faker->randomElement($districts);
        $area = $this->faker->randomElement($areas);
        $street = $this->faker->randomElement($streets);

        return "House #" . mt_rand(100, 999) . ", $street, $area, $district";
    }
}
