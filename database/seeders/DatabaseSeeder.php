<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            EmployeeSeeder::class,
            ServiceSeeder::class,
        ]);

        $services = Service::all();
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $randomServices = $services->take(random_int(1, 3));
            $serviceIds = $randomServices->pluck('id')->all();
            $employee->services()->sync($serviceIds);
        }
    }
}
