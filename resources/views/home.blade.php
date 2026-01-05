@extends('layouts.app')

@section('title', 'Página home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div class="card-body">
                    {{ dump(Auth::user()) }}
                </div>

                <div class="card-body">
                    <div>Nombre: {{ Auth::user()->name }}</div>
                    <div>Perfil: {{ Auth::user()->role }}</div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
