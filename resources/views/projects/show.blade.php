@extends('layouts.app')
@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">

            <p class="text-base text-default no-underline">
                <a href="/projects" class="text-base text-default no-underline">My Projects</a> / {{ $project->title }}
            </p>

            <div class="flex items-center">
                @foreach ($project->members as $member)
                    <img src="{{ pravatar_url($member->id) }}" alt="{{ $member->name }}'s avatar"
                        class="rounded-full w-8 mr-2">
                @endforeach

                <img src="{{ pravatar_url($project->owner->id) }}" alt="{{ $project->owner->name }}'s avatar"
                    class="rounded-full w-8 mr-2">

                <a href="{{ $project->path() . '/edit' }}" class="button ml-4">Edit Project</a>
            </div>

        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-default font-normal text-lg mb-3">Tasks</h2>
                    {{-- Tasks --}}

                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf

                                <div class="flex">
                                    <input name="body"
                                        class="bg-card text-default w-full {{ $task->completed ? 'text-default' : '' }}"
                                        value="{{ $task->body }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()"
                                        {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input class="w-full bg-card text-default" placeholder="Begin adding tasks..." name="body">
                        </form>
                    </div>

                </div>

                <div>
                    <h2 class="text-default font-normal text-lg mb-3">General Notes</h2>
                    {{-- General Notes --}}

                    <form method="POST" action="{{ $project->path() }}">
                        @method('PATCH')
                        @csrf

                        <textarea name="notes" class="card w-full mb-4" style="min-height: 200px"
                            placeholder="Anything special that you want to make a note of?">{{ $project->notes }}</textarea>

                        <button type="submit" class="button">Save</button>

                    </form>

                    @include('errors')
                </div>
            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects.card')
                @include('projects.activity.card')

                @can('manage', $project)
                    @include('projects.invite')
                @endcan
            </div>
        </div>
    </main>
@endsection
