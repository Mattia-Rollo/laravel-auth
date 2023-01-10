@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row py-3">
        @foreach ($projects as $project)
        <div class="col-6 g-2">
            <div class="card text-bg-dark">
                <img src="https://via.placeholder.com/250x100.png?text=Visit+WhoIsHostingThis.com+Buyers+Guide" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title"><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></h5>
                  <p class="card-text">{{$project->content}}</p>
                  <p class="card-text"><small></small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
 </div>
 <ul>
    @foreach ($projects as $project)
        <li><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></li>
    @endforeach
</ul>
@endsection