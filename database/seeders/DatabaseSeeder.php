<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => "Abdulmalik Alsufayran",
            'email' => "admin@estibanah.com",
            'password' => bcrypt('YWRtaW4=')
        ])
        $this->call(FormSeeder::class);
    }
}
