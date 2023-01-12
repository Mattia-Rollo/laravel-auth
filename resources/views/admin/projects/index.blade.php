@extends('layouts.admin')

@section('content')
 
<div class="text-end"><a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a> </div> 

  <div class="row py-2 g-2">
     
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Categoria</th>
          <th scope="col">slug</th>
          <th scope="col text-center">controlli</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
        <tr>
          <th scope="row">{{$project->id}}</th>
          <td>{{$project->title}}</td>
          <td>{{$project->category ? $project->category->name : 'Senza categoria'}}</td>
          <td>{{$project->slug}}</td>
          <td>
            <div class="d-flex ">
              <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary m-2"><i class="fa-solid fa-eye"></i></a>
              <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-secondary m-2"><i class="fa-solid fa-pen"></i></a>
            
              <!-- bottone delete -->
              <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button btn btn-danger m-2" data-item-title="{{$project->title}}"><i class="fa-solid fa-trash"></i></button>
              </form>
            </div>
          </td>

      
          @endforeach
        </tr>
        
      </tbody>
    </table>
      
  </div>



 @include('partials.modal_delete')
@endsection