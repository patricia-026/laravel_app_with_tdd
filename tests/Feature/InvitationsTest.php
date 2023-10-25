<?php

namespace Tests\Feature;

use App\Http\Controllers\ProjectTasksController;
use App\Models\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_project_can_invite_a_user()
    {
        // Given I have a project
        $project = ProjectFactory::create();

        // And the owner of the project invites another user
        $project->invite($newUser = User::factory()->create());

        // Then, that new user will have permissions to add tasks
        $this->signIn($newUser);
        $this->post(action([ProjectTasksController::class, 'store'], $project), $task = ['body' => 'Foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }
}
