<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@localhost.com',
            'password' => Hash::make('admin')
        ]);
        User::create([
            'name' => 'Boris Ndouma',
            'role_id' => 2,
            'email' => 'jaris.ultio.21@gmail.com',
            'password' => Hash::make('Marvinboris21')
        ]);
    }
}
