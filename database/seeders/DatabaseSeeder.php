<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(UsersTableSeeder::class);
        $this->command->info('  >>> Таблица USERS загружена данными!');
        $this->command->info('');

        $this->call(CompanySeeder::class);
        $this->command->info('  >>> Таблица COMPANIES загружена данными!');
        $this->command->info('');

        $this->call(EmployeeSeeder::class);
        $this->command->info('  >>> Таблица EMPLOYEES загружена данными!');
        $this->command->info('');

    }
}
