<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use RecordsActivity;

    protected $guarded = [];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function addTasks($tasks)
    {
        return $this->tasks()->createMany($tasks);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        // is it true that a project can have many members
        // AND ALSO a member can have many projects
        // true->pivot table
        return $this->belongsToMany(User::class, 'project_members')->withTimestamps();
    }
}
