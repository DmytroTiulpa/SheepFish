<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Очистим таблицу перед заполнением новыми данными
        Company::truncate();

        // Заполняем таблицу данными с использованием фабрики
        \App\Models\Company::factory(50)->create();
    }
}
