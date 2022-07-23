@extends('layouts.dafault')

@section('title', 'Perfil time')

@section('content')
    <main role="main">
        <div class="bg-light p-3">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">{{$user->name}}</h1>
                        <code class="text-info">{{date('d/m/Y', strtotime($user->created_at))}}</code>
                        <p class="lead text-muted">{{$user->address->street}}, nº {{$user->address->number}} / {{$user->address->city}}</p>
                    <p>
                        <a class="btn btn-primary my-2" href="{{route('user.edit', ['user'=> $user->id])}}">Editar</a>
                        <a class="btn btn-info my-2" href="{{route('user.index')}}" type="button">Voltar</a>
                    </p>
                </div>
            </section>

            <section class="text-center album  bg-light">
                <div class="container">
                    <h1 class="jumbotron-heading">Meus posts</h1>

                    @if($user->posts->count() > 0)
                        <div class="row">
                            @foreach($user->posts as $p)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img class="card-img-top rounded-top" src="/storage/{{$p->cover}}" data-src="{{$p->cover}}" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">{{Str::limit($p->content, 70)}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{route('post.show', ['post'=> $p->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                                    <a href="{{route('post.edit', ['post'=> $p])}}" type="button" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                </div>
                                                <img class="rounded-circle border-danger" src="/storage/{{$p->cover}}" width=20" height="20" alt="User Image">
                                                <small class="text-muted">{{date('d/m/Y', strtotime($p->created_at))}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <p class="card-text">Este usuário não criou postagens!</p>
                            </div>
                        </div>

                    @endif
                </div>
            </section>

            <hr>
        </div>
    </main>
@endsection
