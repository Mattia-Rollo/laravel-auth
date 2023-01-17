@extends('layouts.admin')

@section('content')
 
<div class="d-flex justify-content-between">
  
  <h2>Ruolo: {{Auth::user()->isAdmin() ? 'Amminstratore' : 'User'}}</h2>
  <div><a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a></div>
</div>

@include('partials.admin.error-message')
  <div class="row py-2 g-2">
     
    <table class="table table-striped table-hover table-bordered">
      
      <thead class="text-bg-primary">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Categoria</th>
          <th scope="col">tags</th>
          <th scope="col">Autore</th>
          <th scope="col">Content</th>
          <th scope="col">Data</th>
          <th scope="col">Controlli</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
        <tr>
          <th scope="row">{{$project->id}}</th>
          <td>{{Str::limit($project->title,30)}}</td>
          <td>{{$project->category->name?? ''}}</td>
          <td>
            @foreach($project->tags as $tag)
             <span>{{$tag->name}}</span>
            @endforeach 
          </td>
          <td class="text-center">{{$project->user->name?? ''}}</td>
          <td>{!!Str::limit($project->content,80)!!}</td>
          <td><div>Data: {{$project->created_at}}</div></td>
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


  {{ $projects->links('vendor.pagination.bootstrap-5') }}
 @include('partials.modal_delete')
@endsection