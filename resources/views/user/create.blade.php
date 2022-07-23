@extends('layouts.dafault')

@section('title', 'Cadastro usuário')
@include('layouts.partials.css-form')

@section('content')
    <div class="bg-light bg-form">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Nome <span class=" text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name" autofocus
                           placeholder="nome" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password">Senha <span class=" text-danger">*</span></label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Senha" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email <span class=" text-danger">*</span></label>
                <input name="email" type="email" class="form-control" id="email" required placeholder="you@example.com">
            </div>

            <small class="text-dark mb-3 mt-3">Endereço</small>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Rua <span class=" text-danger">*</span></label>
                    <input name="street" type="text" class="form-control" id="cc-name" placeholder="rua" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="cc-number">Numero <span class=" text-danger">*</span></label>
                    <input name="number" type="text" class="form-control" id="cc-number" placeholder="Numero" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="cc-number">Cidade <span class=" text-danger">*</span></label>
                    <input name="city" type="text" class="form-control" id="cc-number" placeholder="Cidade" required>
                </div>
            </div>


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
            <small id="emailHelp" class="form-text text-danger">* campos obrigatórios</small>
        </form>
    </div>
@endsection
