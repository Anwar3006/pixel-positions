<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();

        //This will create the Jobs by splitting it into 10 for false and 10 for true
        Job::factory(20)->hasAttached($tags)->create(new Sequence(
            [
                'featured' => true
            ],
            [
                'featured' => false
            ]
        ));
    }
}
