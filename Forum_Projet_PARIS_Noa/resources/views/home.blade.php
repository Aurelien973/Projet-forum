@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#1F2F50;color:white">{{ __('Dashboard') }}</div>

                <div class="card-body" style="background-color: #364769;color:white">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Connexion réussi !') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
