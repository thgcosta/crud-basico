@extends('layouts.app')
@php
    use Illuminate\Support\Str
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (Str::contains(url()->current(), 'update'))
                <div class="card-header">{{ __('Editar Usuario Existente') }}</div>
                <div class="card-header"><a href="{{ url('users') }}">Voltar</a></div>
                @else
                <div class="card-header">{{ __('Cadastro Novo Usuario') }}</div>                
                <div class="card-header"><a href="{{ url('users') }}">Voltar</a></div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Str::contains(url()->current(), 'update'))
                    <form action="{{ url('users/save/' . $user->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                    @else
                    <form action="{{ route('users.add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
