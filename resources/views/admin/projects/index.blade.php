@extends('layouts.app')

@section('content')

<div class="container py-4">
    
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>
                All Projects
            </h1>
        </div>
        <div>
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Add a project</a>
        </div>
    </div>

    @if(session('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations:</strong> {{session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Thumb</th>
            <th scope="col">Title</th>
            <th scope="col">Repo name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>
                    <img src="{{$project->thumb}}" alt="" width="100">
                </td>
                <td>
                    {{$project->title}}
                </td>
                <td>
                    {{$project->repo_name}}
                </td>
                <td>
                    <a href="{{route('admin.projects.show',$project->slug)}}" class="btn btn-primary">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>


@endsection