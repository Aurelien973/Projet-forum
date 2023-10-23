@extends('layouts.app')

    <script>
        function toggleReplyComment(id)
        {
            let element = document.getElementById('replyComment-' + id);
            element.classList.toggle('d-none');
        }
    </script>

@section('content')
    <div class="container">
        <div class="card" style="background-color: #364769">
            <div class="card-body">
                <h5 class="card-title" style="color:white;text-align:center">{{ $topic->title }}</h5>
                <br>
                <p style="color:white"> {{ $topic->content }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small style="color:#C3C3C3"> Créé le {{ $topic -> created_at -> format('d/m/Y à H:m') }} </small>
                    <span class="badge badge-primary" style="color:white;background-color:#1F2F50">{{ $topic->user->name }}</span>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center">
                    @can('update', $topic)
                    <a href="{{ route('topics.edit', $topic) }}" class="btn btn-warning">Editer le Topic</a>
                    @endcan
                    @can('delete', $topic)
                    <form action=" {{ route('topics.destroy', $topic) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Supprimer le Topic </button>
                    </form>
                    @endcan
                </div> 
            </div>
        </div>
        <hr style="color:white">
        <h5 style="color:white">Commentaires</h5>
        @forelse ($topic->comments as $comment)
            <div class="card mt-2" style="background-color: #364769">
                <div class="card-body" style="color:white">
                    {{ $comment-> content }}
                    <div class="d-flex justify-content-between align-items-center">
                    <small style="color:#C3C3C3"> Envoyé le {{ $comment -> created_at -> format('d/m/Y') }} </small>
                    <span class="badge badge-primary" style="color:white;background-color:#1F2F50">{{ $comment->user->name }}</span>
                    </div>
                </div>
            </div>
        @foreach ($comment->comments as $replyComment)
            <div class="card mt-2" style="background-color: #364769;margin-left:4%">        
                <div class="card-body" style="color:white">
                    {{ $replyComment-> content }}
                    <div class="d-flex justify-content-between align-items-center">
                    <small style="color:#C3C3C3"> Envoyé le {{ $replyComment -> created_at -> format('d/m/Y') }} </small>
                    <span class="badge badge-primary" style="color:white;background-color:#1F2F50">{{ $replyComment->user->name }}</span>
                    </div>
                </div>
    </div>
        @endforeach

        @auth
        <button class="btn btn-info mt-1 mb-2" onclick="toggleReplyComment( {{ $comment -> id }} )">Répondre</button>
        <form action=" {{ route('comments.storeReply' , $comment) }} " method="POST" style="width: 50%;margin-left:3%" class="d-none" id="replyComment-{{ $comment -> id }}">
            @csrf
            <div class="form-group">
                <label for="replyComment" style="color:white">Ma réponse</label>
                <textarea name="replyComment" class="form-control @error('replyComment') is-invalid @enderror" id="replyComment" rows="3"></textarea>
                @error('replyComment')
                    <div class="invalid-feedback">{{ $errors->first('replyComment') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Répondre à ce commentaire</button>
        </form>
        @endauth
        @empty
            <div class="alert alert-info">Aucun commentaire pour ce topic</div>

        @endforelse
        <form action="{{ route('comments.store', $topic) }}" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="content" style="color:white">Votre commentaire</label>
                <textarea class="form-control @error('content') is-invalid @enderror mt-2" name="content" id="content" rows="5"></textarea>
            @error('content')
                <div class="invalid-feedback"> {{ $errors->first('content') }}</div> 
            @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Soumettre le commentaire</button>
        </form>
    </div>
@endsection