@extends('layouts.admin')

@section('content')
 
<div class="text-end"><a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a> </div> 

  <div class="row py-2 g-2">
        
      
      @foreach ($projects as $project)
        <div class="col-lg-4 col-sm-6 col-12">

          <div class="card h-100 shadow-lg">

            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></h5>
              <p class="card-text">{{Str::limit($project->content, 50, '...')}}</p>
            </div>

                <div class="d-flex justify-content-center">
                  <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary m-2"><i class="fa-solid fa-eye"></i></a>
                  <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-secondary m-2"><i class="fa-solid fa-pen"></i></a>
                  
                  <!-- bottone delete -->
                  <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger m-2" data-item-title="{{$project->title}}"><i class="fa-solid fa-trash"></i></button>
                  </form>

                </div>

            </div>

        </div>
      @endforeach

    </div>


 @include('partials.modal_delete')
@endsection