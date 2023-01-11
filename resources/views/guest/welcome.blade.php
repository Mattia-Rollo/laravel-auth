@extends('layouts.app')
@section('content')

<div class="jumbotron p-4 mb-4 bg-light rounded-3">
    <div class="container">
        
        
        <h1 class="display-5 fw-bold text-center pb-3">
            Welcome to My Projects
        </h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <div class="row py-3">
            @foreach ($projects as $project)
            <div class="col-4 g-2">
    
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></h5>
                      <p class="card-text">{{$project->content}}</p>
                    </div>
                    <div class="d-flex">
                      <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary m-2 w-25">view</a>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>


        
        
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div>
@endsection
