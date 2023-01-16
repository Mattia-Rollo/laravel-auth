@extends('layouts.app')
@section('content')

<div class="jumbotron p-4 mb-4 bg-light rounded-3">
    <div class="container">
        
        
        <h1 class="display-5 fw-bold text-center text-primary pb-3">
            Welcome to My Projects
        </h1>
        <p class="col-md-12 fs-4 text-center">Hi there! How is it going? I'm Mattia and i'm web developer, below you can find some of my latest projects achived with Laravel</p>
        <div class="row py-3">
            @foreach ($projects as $project)
            <div class="{{ $loop->first ? 'col-12' : 'col col-sm-6 col-md-4' }} g-2 first-project">
    
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title {{$loop->first ? 'display-3 fw-semibold' : ''}} text-center"><a class=" text-decoration-none"href="{{ route('show', $project->slug) }}">{{$project->title}}</a></h4>
                        <p class="card-text">{!!$project->content!!}</p>
                        <div class="d-flex justify-content-between" >
                        @if($project->cover_image)
                        <div class="box-img shadow-lg w-50">
                            <a href="https://mattia-rollo.github.io/boolflix/"><img src="{{asset('storage/' . $project->cover_image)}}" class="h-100" alt=""></a>
                        </div>
                        @endif

                        
                          <a href="{{ route('show', $project->slug) }}" class="btn btn-primary align-self-end
                            
                           {{$loop->first ? '' : ''}} w-25">view</a>
                        </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            
                    <div class="github-card" data-github="Mattia-Rollo" data-width="400" data-height="" data-theme="medium"></div>

                    <iframe src="https://mattia-rollo.github.io/boolflix/" width="100%" height="400" frameborder="1" scrolling="no"></iframe>
                
<script src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>


        
        
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div>
@endsection
