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
                    @if($project->thumb)
                        @if(str_contains($project['thumb'],'http'))
                        <img src="{{$project->thumb}}" alt="" width="100">
                        @else
                        <img src="{{asset('storage/' . $project->thumb)}}" alt="" width="100">
                        @endif
                    @endif
                </td>
                <td>
                    {{$project->title}}
                </td>
                <td>
                    {{$project->repo_name}}
                </td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('admin.projects.show',$project->slug)}}" class="btn btn-primary">Details</a>
                        <a href="{{route('admin.projects.edit',$project->slug)}}" class="btn btn-secondary">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$project->id}}">
                            Delete
                        </button>
                          
                          <div class="modal fade" id="deleteModal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete <em>{{$project->title}}</em></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Are you sure you want to delete this project?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form action="{{route('admin.projects.destroy',$project->id)}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>

@endsection