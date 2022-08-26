<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $technologies = ['React', 'Laravel', 'Node Js', 'Angular', 'Symphony', 'Java', 'C'];
            foreach ($technologies as $technology) {
                $tech = new Technology();
                    $tech->name = $technology;
                $tech->save();
            }
        }

    }

