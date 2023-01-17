@extends('layouts.admin')

@section('content')
 
{{-- <div class="d-flex justify-content-between"> --}}
  
  <h2>Ruolo: {{Auth::user()->isAdmin() ? 'Amminstratore' : 'Dipendente'}}</h2>
  <form action="{{route('admin.tags.store')}}" method="post" class="d-flex align-items-center">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" class="form-control" placeholder="
        Add a tag name here " aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
    </div>
</form>

@include('partials.admin.error-message')
  
<div class="row py-2 g-2">
     
    <table class="table table-striped table-hover table-bordered">
      <thead class="text-bg-primary">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Projects</th>
          <th scope="col">Autore</th>
          <th scope="col">Content</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
        <tr>
          <th scope="row">{{$tag->id}}</th>
          {{-- <td>{{Str::limit($project->title,30)}}</td> --}}
          <td>
            <form id="tag-{{$tag->id}}" action="{{route('admin.tags.update', $tag->slug)}}" method="post">
              @csrf
              @method('PATCH')
              <input class="border-0 bg-transparent" type="text" name="name" value="{{$tag->name}}">
            </form>
          </td>

          <td class="text-center">

            @if($tag->projects)
            {{count($tag->projects)}}
            @endif

        </td>
          {{-- <td>{!!Str::limit($project->content,80)!!}</td> --}}
          <td><div>Data: {{$tag->created_at}}</div></td>
          <td>
            <div class="d-flex ">
              <!-- bottone delete -->
              {{-- {{$tag}} --}}
            @if(Auth::user()->isAdmin())
              <form action="{{route('admin.tags.destroy', $tag->slug )}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$tag->name}}"><i class="fa-solid fa-trash-can"></i></button>
             </form>
             @endif
            </div>
          </td>

      
          @endforeach
        </tr>
        
      </tbody>
    </table>
      
  {{-- </div> --}}



 @include('partials.modal_delete')
@endsection