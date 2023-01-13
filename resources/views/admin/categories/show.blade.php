@extends('layouts.admin')

@section('content')

@include('partials.admin.error-message')

<h1>{{$category->name}}</h1>
<ul>
    @foreach ($category->posts as $post)
        <li>{{$post->title}}</li>
    @endforeach
</ul>

 
@endsection