<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'Permis A',
            'condition' => 'Âge : 16 ans et plus'
        ]);
        Category::create([
            'name' => 'Permis B',
            'condition' => 'Âge : 18 ans et plus'
        ]);
        Category::create([
            'name' => 'Permis C',
            'condition' => 'Permis B : 2 ans et plus'
        ]);
        Category::create([
            'name' => 'Permis D',
            'condition' => 'Permis C : 1 an et plus'
        ]);
        Category::create([
            'name' => 'Permis E',
            'condition' => 'Permis C : 2 ans et plus'
        ]);
        Category::create([
            'name' => 'Permis G',
            'condition' => 'Candidature sur présentation du permis B'
        ]);
    }
}
