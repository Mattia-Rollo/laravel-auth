@extends('layouts.app')
@section('content')

<div class="jumbotron p-4 mb-4 bg-light rounded-3">
    <div class="container">
        
        
        <h1 class="display-5 fw-bold text-center pb-3">
            Welcome to My Projects
        </h1>
        <p class="col-md-12 fs-4 text-center">Hi there! How is it going? I'm Mattia and i'm web developer, below you can find some of my latest projects achived with Laravel</p>
        <div class="row py-3">
            @foreach ($projects as $project)
            <div class="{{ $loop->first ? 'col-12' : 'col col-sm-6 col-md-4' }} g-2 first-project">
    
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title fs-4"><a class=" text-decoration-none"href="{{ route('show', $project->slug) }}">{{$project->title}}</a></h5>
                        <p class="card-text">{{$loop->first ? Str::limit($project->content, 600, '...') : Str::limit($project->content, 250, '...')}}</p>
                        <div class="box-img"><img src="{{asset('storage/' . $project->cover_image)}}" class="" alt=""></div>
                    </div>
                    <div class="d-flex justify-content-end" >
                      <a href="{{ route('show', $project->slug) }}" class="btn btn-primary m-2
                        
                       {{$loop->first ? 'w-10' : 'w-25'}}">view</a>
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
