@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status')) 
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <div class="pb-3">{{ __('You are logged in!') }}</div>
                        <div class=""><a href={{ route('admin.projects.index') }}>Vedi Tutti i Progetti</a> <i class="fa-solid fa-house"></i></div>
                    </div>
                    <ul class="list-group">
                        @foreach ($projects as $project)
                            <li class="list-group-item"><a href="{{ route('admin.projects.show', $project->slug) }}">{{$project->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>





@endsection
