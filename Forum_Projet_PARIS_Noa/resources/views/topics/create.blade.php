@extends('layouts.app')

@section('content')
    <div class="container" style="color:white">
        <h1>Créer un Topic</h1>
        <hr>
        <form action=" {{ route ('topics.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titre du Topic</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="content">Description</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"></textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
            <div  class="form-group" style="text-align:center">
                <button type="submit" class="btn btn-primary">Créer le Topic</button>
            </div>
        </form>
    </div>
@endsection