@extends('layouts.app')

@section('content')


    <article>
        <h1 class="py-5">{{$project->title}}</h1>

        <p>
            {{$project->content}}
            
        </p>
        <img class="w-25" src="{{asset('storage/' . $project->cover_image)}}" alt="" >
    <article>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back</a>


 
@endsection