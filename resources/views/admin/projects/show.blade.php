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
        <div class="row py-2">
            <div class="col">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam quidem eaque odio corrupti, consequuntur nam exercitationem aspernatur cupiditate deserunt aut rem sed voluptate omnis ipsum saepe dicta ex voluptas doloremque. Inventore blanditiis ipsa error tenetur aperiam magnam nostrum! Culpa et quae dolor dicta quasi similique nulla ipsum facere cumque beatae.
            </div>
            <div class="col">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis tempore impedit quo nesciunt magnam ullam necessitatibus non asperiores praesentium eveniet officiis incidunt hic similique, omnis, aut ex repellendus obcaecati quia.
            </div>
        </div>

        <div class="row py-2">
            <div class="col">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio officia adipisci rem perferendis beatae excepturi at nulla ab, debitis a ad sint esse ducimus animi tenetur sunt, qui natus. Excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio officia adipisci rem perferendis beatae excepturi at nulla ab, debitis a ad sint esse ducimus animi tenetur sunt, qui natus. Excepturi.</p>
            </div>
        </div>
        
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mb-4">Back</a>


 
@endsection