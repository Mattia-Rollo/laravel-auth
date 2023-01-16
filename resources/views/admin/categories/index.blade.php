@extends('layouts.admin')

@section('content')
 
<div class="text-end"><a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a> </div> 

  <div class="row py-2 g-2">
        
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Numero Post</th>
          <th scope="col">slug</th>
          <th scope="col text-center">controlli</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <th scope="row">{{$category->id}}</th>
          <td><a href="{{route('admin.categories.show', $category->slug)}}">{{$category->name}}</a></td>
          <td>{{count($category->projects)}}</td>
          <td>{{$category->slug}}</td>
          <td>
            <div class="d-flex ">
              <a href="{{ route('admin.categories.show', $category->slug) }}" class="btn btn-primary m-2"><i class="fa-solid fa-eye"></i></a>
              <a href="{{ route('admin.categories.edit', $category->slug) }}" class="btn btn-secondary m-2"><i class="fa-solid fa-pen"></i></a>
            
              <!-- bottone delete -->
              <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button btn btn-danger m-2" data-item-title="{{$category->name}}"><i class="fa-solid fa-trash"></i></button>
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