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
        <img class="w-25" src="{{asset('storage/' . $project->cover_image)}}" alt="" >
    <article>

        <div class="mt-2"><a href="{{ url('/') }}" class="btn btn-primary">Back</a></div>


@endsection