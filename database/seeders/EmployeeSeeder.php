<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'EmployeeFName'=>'Nessa',
            'EmployeeLName'=>'Quimbo',
            'EmployeeMName'=>'P',
            'EmployeeContactNum'=> '09171234567',
            'EmployeeRole' => 'Owner',
            'EmployeeStatus' => 'Active',
            'hire_date' => '2021-05-12',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);

        Employee::factory()->count(2)->create(); // if you created a factory
    }
}
