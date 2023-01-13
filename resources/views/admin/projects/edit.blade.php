@extends('layouts.admin')

@section('content')

{{-- {{dd(old('category_id'))}} --}}
{{-- {{dd($project->category->id)}} --}}

<h1>Edit Post: {{$project->title}}</h1>
<div class="row bg-white">
    <div class="col-12">
        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')
              <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3"  id="container-editor">
                
                <label for="content" class="form-label">Content</label>
                {{-- <div id="editor"> --}}
                    <textarea id="editor" rows="10" class="form-control" id="content" name="content">{!!old('content', $project->content)!!}</textarea>
                {{-- </div> --}}

              </div>
              <div class="d-flex">
                <div class="media me-4">
                    <img class="shadow" width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}">
                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Replace post image</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                    @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="category_id" class="form-label">Seleziona categoria</label>
                
                
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                  
                  <option value="">Select category</option>
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}"
                        
                        @if(! empty($project->category->id))
                        
                        {{ $category->id == old('category_id', $project->category->id) ? 'selected' : '' }}
                        
                        @endif

                        >{{$category->name}}</option>
                  @endforeach
                </select>
                
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

              </div>
              <div class="d-flex gap-1">
                <a href="{{route('admin.projects.index')}}" class="btn btn-primary me-auto"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
                <button type="submit" class="btn btn-success">Salva</button>
                <button type="reset" class="btn btn-primary">Resetta</button>
              </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
 
@endsection