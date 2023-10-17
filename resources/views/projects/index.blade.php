@extends('layouts.app')
@section('content')
    <div class="flex items-center mb-3">
        <a class="text-sky-500 text-base" href="/projects/create">New Project</a>
    </div>

    <div class="flex">
        @forelse ($projects as $project)
            <div class="bg-white rounded mr-4 p-5 shadow w-1/3" style="height: 200px">
                <h3 class="font-normal text-xl py-4">{{ $project->title }}</h3>

                <div class="text-gray-400">{{ Illuminate\Support\Str::limit($project->description, 100) }}</div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </div>
@endsection
