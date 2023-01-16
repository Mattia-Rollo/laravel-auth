@extends('layouts.admin')

@section('content')

@include('partials.admin.error-message')

<h1>{{$category->name}}</h1>
<ul>
    @foreach ($category->projects as $project)
        <li>{{$project->title}}</li>
    @endforeach
</ul>

 
@endsection