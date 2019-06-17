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
            'name' => 'Boris Ndouma',
            'role_id' => 1,
            'is_active' => 1,
            'email' => 'jaris.ultio.21@gmail.com',
            'password' => Hash::make('Marvinboris21')
        ]);
    }
}
