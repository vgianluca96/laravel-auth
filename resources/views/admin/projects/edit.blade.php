@extends('admin.layouts.app')

@section('content')

<div class="container py-4">

    <div class="py-2">
      <h1>Add a new project</h1>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{route('admin.projects.update',$project)}}" method="POST" enctype="multipart/form-data" class="row g-3">
    
        @csrf
        @method('PUT')
    
        <div class="col-md-6">
            <label for="projectTitle" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="projectTitle" name="title" placeholder="example title" value="{{old('title', $project->title)}}">
            @error('title')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
        </div>
    
        <div class="col-md-6">
            <label for="projectRepoName" class="form-label">Repo Name</label>
            <input type="text" class="form-control @error('repo_name') is-invalid @enderror" id="projectRepoName" name="repo_name" placeholder="example repo name" value="{{old('repo_name', $project->repo_name)}}">
            @error('repo_name')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
        </div>
    
        <div class="col-md-12">
            <label for="projectDescription" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="projectDescription" name="description" placeholder="example description">{{old('description', $project->description)}}</textarea>
            @error('description')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="projectThumb" class="form-label">Project preview</label>
            <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="projectThumb" name="thumb">
            @error('thumb')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
        </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('admin.projects.index')}}" class="btn btn-light">Cancel</a>
          </div>

    </form>

</div>

@endsection