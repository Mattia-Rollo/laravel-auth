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
        Project::truncate();

        for ($i = 0; $i < 5; $i++) {
            $project = new Project();
            $project->title = fake()->sentence(3);
            $project->slug = $project::generateSlug($project->title);
            $project->content = fake()->paragraph(3);
            $project->save();

        }
    }
}