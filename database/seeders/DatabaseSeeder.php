<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $sarahMiller = User::where('email', 'sarahmiller@example.com')->first();
        if (!$sarahMiller) {
            $sarahMiller = User::factory()->create([
                'name' => 'Sarah Miller',
                'email' => 'sarahmiller@example.com',
                'password' => Hash::make('password')
            ]);
        }

        $johnDoe = User::where('email', 'johndoe@example.com')->first();
        if (!$johnDoe) {
            $johnDoe = User::factory()->create([
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password')
            ]);
        }

        $maryTaylor = User::where('email', 'marytaylor@example.com')->first();
        if (!$maryTaylor) {
            $maryTaylor = User::factory()->create([
                'name' => 'Mary Taylor',
                'email' => 'marytaylor@example.com',
                'password' => Hash::make('password')
            ]);
        }

        $sarahProjects = Project::where('owner_id', $sarahMiller->id)->first();
        if (!$sarahProjects) {
            $project = Project::factory()->create(['title' => 'Project with tasks', 'description' => 'A Project with two tasks and two invited people.', 'owner_id' => $sarahMiller->id]);
            Task::factory(2)->create(['project_id' => $project->id]);
            $project->invite($johnDoe);
            $project->invite($maryTaylor);
            $project = Project::factory(4)->create(['owner_id' => $sarahMiller->id]);
        }

        $johnProjects = Project::where('owner_id', $johnDoe->id)->first();
        if (!$johnProjects) {
            $project = Project::factory()->create(['owner_id' => $johnDoe->id]);
        }
    }
}
