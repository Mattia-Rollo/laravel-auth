@extends('layouts.app')

@section('content')

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
                        <textarea class="form-control" row="20" id="content" name="content">{{old('content', $project->content)}}</textarea>
                      </div>
                      <div class="d-flex">
                        <div class="media me-4">
                            <img class="shadow-lg" width="250" src="{{$project->cover_image ? asset('storage/' . $project->cover_image) : 'https://picsum.photos/200/300'}}" alt="{{$project->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Replace post image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                            @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                      <div class="py-2">
                        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                      </div>
                </form>
            </div>
        </div>

        

 
@endsection