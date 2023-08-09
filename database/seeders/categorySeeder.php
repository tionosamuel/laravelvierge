<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'nom'=>'legume',
        ]);
        category::create([
            'nom'=>'fruit',
        ]);
        category::create([
            'nom'=>'insecticide',
          
        ]);
        
    }
}
