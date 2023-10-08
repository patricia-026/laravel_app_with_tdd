@extends('layouts.app')
@section('content')
    <div class="flex items-center mb-3">
        <a class="text-sky-500 text-base" href="/projects/create">New Project</a>
    </div>

    <ul class="list-disc list-inside pl-5">
        @forelse ($projects as $project)
            <li>
                <a href="{{ $project->path() }}" class="text-sky-500 text-base">{{ $project->title }}</a>
            </li>

        @empty
            <li>No projects yet.</li>
        @endforelse
    </ul>
@endsection
