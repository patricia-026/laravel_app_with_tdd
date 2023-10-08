@extends('layouts.app')
@section('content')
    <h1 class="text-3xl">{{ $project->title }}</h1>
    <div class="text-base mt-2 mb-2">{{ $project->description }}</div>
    <a class="text-sky-500 text-base" href="/projects">Go Back</a>
@endsection
