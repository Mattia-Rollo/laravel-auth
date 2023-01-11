@extends('layouts.app')

@section('content')

<h1 class="text-center py-5">{{$project->title}}</h1>
    <article class="row ">
        
            
        <div class="col-4">
            <div class="img-placeholder h-100">
                {!!$project->cover_image ? '' : '<h4>image placeholder text</h4>'!!}
            
                <img class="" src="{{$project->cover_image ? asset('storage/' . $project->cover_image) : ''}}" alt="{{$project->cover_image}}" >
            
            </div>
        </div>


            <div class="col-8 justify-content-between">
    
                <p>
                    {{$project->content}}
                </p>
            </div>
            
            
        </article>
        
        <a href="{{ route('admin.projects.index') }}" class="btn  btn-primary my-4 btn-lg">Back</a>


@endsection
