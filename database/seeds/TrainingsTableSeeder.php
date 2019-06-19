<?php

use Illuminate\Database\Seeder;
use App\Training;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Training::create([
            'name' => 'Formation normale',
            'cost' => 100000,
            'duration' => 60,
            'theory' => 120,
            'practice' => 40,
            'category_id' => 1
        ]);
        Training::create([
            'name' => 'Formation normale',
            'cost' => 250000,
            'duration' => 60,
            'theory' => 120,
            'practice' => 40,
            'category_id' => 2
        ]);
        Training::create([
            'name' => 'Formation normale',
            'cost' => 500000,
            'duration' => 60,
            'theory' => 120,
            'practice' => 40,
            'category_id' => 3
        ]);
        Training::create([
            'name' => 'Formation normale',
            'cost' => 500000,
            'duration' => 60,
            'theory' => 120,
            'practice' => 40,
            'category_id' => 4
        ]);
        Training::create([
            'name' => 'Formation normale',
            'cost' => 500000,
            'duration' => 60,
            'theory' => 120,
            'practice' => 40,
            'category_id' => 5
        ]);
        Training::create([
            'name' => 'Formation normale',
            'cost' => 700000,
            'duration' => 60,
            'theory' => 120,
            'practice' => 40,
            'category_id' => 6
        ]);
        Training::create([
            'name' => 'Formation accélérée',
            'cost' => 100000,
            'duration' => 30,
            'theory' => 180,
            'practice' => 90,
            'category_id' => 1
        ]);
        Training::create([
            'name' => 'Formation accélérée',
            'cost' => 300000,
            'duration' => 30,
            'theory' => 180,
            'practice' => 90,
            'category_id' => 2
        ]);
        Training::create([
            'name' => 'Recyclage',
            'cost' => 250000,
            'duration' => 15,
            'theory' => 0,
            'practice' => 40,
            'category_id' => 3
        ]);
        Training::create([
            'name' => 'Recyclage',
            'cost' => 250000,
            'duration' => 15,
            'theory' => 0,
            'practice' => 40,
            'category_id' => 4
        ]);
        Training::create([
            'name' => 'Recyclage',
            'cost' => 250000,
            'duration' => 15,
            'theory' => 0,
            'practice' => 40,
            'category_id' => 5
        ]);
        Training::create([
            'name' => 'Recyclage',
            'cost' => 250000,
            'duration' => 15,
            'theory' => 0,
            'practice' => 40,
            'category_id' => 6
        ]);
    }
}
