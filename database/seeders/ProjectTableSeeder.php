<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Project::truncate();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->category_id = fake()->numberBetween(1, 4);
            $project->user_id = fake()->numberBetween(1, 2);
            $project->title = fake()->sentence(3);
            $project->slug = $project::generateSlug($project->title);
            $project->content = fake()->paragraph(3);
            $project->save();

        }
    }
}