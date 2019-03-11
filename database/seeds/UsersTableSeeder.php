<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@me.com',
            'name' => 'Andi Ahmad Saputra',
            'type' => 'admin',
            'password' => bcrypt('admin123')
        ]);
    }
}
