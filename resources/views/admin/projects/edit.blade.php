@extends('layouts.app')

@section('content')


    edit

    {{-- <article class="mb-5">
        <h1 class="py-5">{{$project->title}}</h1>

        <p>
            {{$project->content}}
            {{$project->content}}
            {{$project->content}}
            {{$project->content}}
            {{$project->content}}
        </p>
    <article>

        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
            class="d-flex flex-column w-50 pb-3">
            @csrf
            @method('PUT')
            
            <div class="">
                <label for="title" class="fs-3">Titolo</label>
                <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="py-2">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back</a>
                <button type="submit" value="Invia" class="btn btn-outline-primary">Salva</button>
            </div>
        </form> --}}

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
                      <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content">{{old('content', $project->content)}}</textarea>
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
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>

        

 
@endsection