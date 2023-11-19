<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Очистим таблицу перед заполнением новыми данными
        Employee::truncate();

        // Заполняем таблицу данными с использованием фабрики
        Employee::factory(150)->create();
    }
}
