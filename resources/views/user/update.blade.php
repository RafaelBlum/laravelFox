@extends('layouts.dafault')

@section('title', 'Perfil time')
@include('layouts.partials.css-form')

@section('content')
    <div class="bg-light p-3">
        <form action="{{route('user.update', ['user' => $user->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Nome <span class=" text-danger">*</span></label>
                    <input value="{{$user->name}}" name="name" type="text" class="form-control" id="name" aria-describedby="name" autofocus
                           placeholder="nome" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password">Senha </label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="nova senha">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email <span class=" text-danger">*</span></label>
                <input value="{{$user->email}}" name="email" type="email" class="form-control" id="email" required placeholder="you@example.com">
            </div>

            <small class="text-dark mb-3 mt-3">Endereço</small>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Rua</label>
                    <input value="{{$user->address->street}}" name="street" type="text" class="form-control" id="cc-name" placeholder="rua" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="cc-number">Numero</label>
                    <input value="{{$user->address->number}}" name="number" type="text" class="form-control" id="cc-number" placeholder="Numero" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="cc-number">Cidade</label>
                    <input value="{{$user->address->city}}" name="city" type="text" class="form-control" id="cc-number" placeholder="Cidade" required>
                </div>
            </div>


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Editar cadastro</button>
            <small id="emailHelp" class="form-text text-danger">* campos obrigatórios</small>
        </form>
    </div>
@endsection
