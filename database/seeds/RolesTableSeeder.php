<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => 'Administrateur'
        ]);
        Role::create([
            'name' => 'Etudiant'
        ]);
        Role::create([
            'name' => 'Enseignant'
        ]);
    }
}
