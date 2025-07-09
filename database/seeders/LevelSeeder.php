<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Education' , 'Award' , 'Certification'] ;

        foreach($names as $name){
           
            Level::create([
                'level_name' => $name,
            ]);

        }
    }
}
