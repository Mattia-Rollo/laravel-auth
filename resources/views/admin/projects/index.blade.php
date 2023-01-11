@extends('layouts.app')

@section('content')
 
<a href="{{ route('admin.projects.create') }}" class="btn btn-secondary m-2">New</a>  

  <div class="row py-3">
        
      
      @foreach ($projects as $project)
        <div class="col-4 g-2">

          <div class="card h-100 shadow-lg">

            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></h5>
              <p class="card-text">{{$project->content}}</p>
            </div>

                <div class="d-flex justify-content-center">
                  <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary m-2">view</a>
                  <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-secondary m-2">edit</a>
                  
                  <!-- bottone delete -->
                  <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger m-2" data-item-title="{{$project->title}}">Cancella</button>
                  </form>

                </div>

            </div>

        </div>
      @endforeach

    </div>


 @include('partials.modal_delete')
@endsection