<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
        [
            "name"       =>    "John Doe",
            "email"      =>    "johndoe@gmail.com",
            "password"      =>    "123456789"
        ]
    );
    }
}
