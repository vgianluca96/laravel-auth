@extends('layouts.app')

@section('content')

<div class="container">
    <h1>
        All Projects
    </h1>

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
                    <a href="{{route('admin.projects.show',$project->slug)}}" class="btn btn-primary">Dettagli</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>


@endsection