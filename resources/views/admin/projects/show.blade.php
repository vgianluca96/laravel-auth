@extends('layouts.app')


@section('content')

<div class="container py-4">

    <h1>
        {{$project->title}}
    </h1>

    <div class="card">
        <div class="row g-0">
          <div class="col-md-6">
            @if(str_contains($project['thumb'],'http'))
            <img src="{{$project->thumb}}" class="img-fluid rounded-start" alt="">
            @else
            <img src="{{asset('storage/' . $project->thumb)}}" class="img-fluid rounded-start" alt="">
            @endif
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <p class="card-text"><strong>Nome repo:</strong>{{$project->repo_name}}</p>
              <p class="card-text"><strong>Descrizione:</strong>{{$project->repo_name}}</p>
            </div>
          </div>
        </div>
      </div>
      
</div>

@endsection