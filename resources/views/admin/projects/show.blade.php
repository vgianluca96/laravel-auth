@extends('layouts.app')


@section('content')

<div class="container">

    questo è il progetto {{$project->id}}
    <ul>
        <li>
            {{$project->id}}
        </li>
        <li>
            {{$project->title}}
        </li>
        <li>
            {{$project->description}}
        </li>
    </ul>

</div>

@endsection