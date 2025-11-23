<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'EmployeeFName' => $this->faker->firstName(),
            'EmployeeLName' => $this->faker->lastName(),
            'EmployeeMName' => $this->faker->optional()->firstName(),
            'EmployeeContactNum' => $this->faker->phoneNumber(),
            'EmployeeRole' => $this->faker->randomElement(['Cashier','SalesPerson','InventoryManager','Owner']),
            'EmployeeStatus' => $this->faker->randomElement(['Active','Inactive']),
            'hire_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
        ];
    }
}
