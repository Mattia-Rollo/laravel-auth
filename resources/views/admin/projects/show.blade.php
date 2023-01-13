@extends('layouts.app')

@section('content')


    <h1 class="text-center py-5">{{$project->title}}</h1>
        <article class="row py-2">
        
            
            <div class="col-12 col-md-8 justify-content-between">
    
                <p>
                    {!!$project->content!!}
                </p>
            </div>
            
            <div class="col-12 col-md-4">
                

                <div class="img-placeholder  shadow">
                    {!!$project->cover_image ? '' : '<h4>image placeholder text</h4>'!!}
                    
                    <img class="" src="{{$project->cover_image ? asset('storage/' . $project->cover_image) : ''}}" alt="{{$project->cover_image}}" >
                
                </div>
            </div>
            
        </article>
        <div class="">
            tag: 
            @if($project->tags && count($project->tags) > 0)
                @foreach ($project->tags as $tag)
                    #<span>{{$tag->name}}</span>
                @endforeach
            @endif

        </div>

       
        
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mb-4">Back</a>


 
@endsection