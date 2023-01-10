@extends('layouts.app')

@section('content')
 sono index
 <ul>
    @foreach ($projects as $project)
        <li><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></li>
    @endforeach
</ul>
@endsection