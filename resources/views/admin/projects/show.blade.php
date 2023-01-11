@extends('layouts.app')

@section('content')


    <article>
        <h1 class="py-5">{{$project->title}}</h1>

        <p>
            {{$project->content}}
            {{$project->content}}
            {{$project->content}}
            {{$project->content}}
            {{$project->content}}
        </p>
    <article>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back</a>


 
@endsection