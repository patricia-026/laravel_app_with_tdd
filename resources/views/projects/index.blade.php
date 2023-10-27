@extends('layouts.app')
@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-base text-muted no-underline">My Projects</h2>
            <a href="#" class="button" data-modal-target="new-project" data-modal-toggle="new-project">New
                Project</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                @include('projects.card')
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </main>


    <!-- Modal toggle -->
    {{--     /*<a data-modal-target="new-project" data-modal-toggle="new-project" href="#" class="button">
        New Project
    </a> --}}

    <new-project-modal></new-project-modal>
@endsection
