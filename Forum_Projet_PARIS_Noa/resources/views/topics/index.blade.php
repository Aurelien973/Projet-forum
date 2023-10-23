@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="list-group ">
            @foreach ($topics as $topic)
            <div class="list-group-item " style="background-color: #364769">
                <h4><a href="{{ route('topics.show', $topic) }}" style="color:white;text-decoration:none"> {{ $topic->title }} </a></h4>
                <p style="color:#C3C3C3"> {{ $topic -> content }} </p>
                <div class="d-flex justify-content-between align-items-center">
                    <small style="color:#C3C3C3"> Créé le {{ $topic -> created_at -> format('d/m/Y à H:m') }} </small>
                    <span class="badge badge-primary" style="color:white;background-color:#1F2F50">{{ $topic->user->name }}</span>
                </div>
            </div>
            @endforeach
        </div>
    
    </div>
@endsection