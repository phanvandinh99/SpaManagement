<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            InvoicesSeeder::class,
            AppointmentSeeder::class,
            OrderSeeder::class,
            TypeSeeder::class,
            ServiceSeeder::class,
            ProductSeeder::class,
            OrderDetailSeeder::class
        ]);
    }
}
