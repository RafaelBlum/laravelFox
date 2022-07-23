@extends('layouts.dafault')

@section('title', 'Lista de times')

@section('content')

    <div class="bg-light p-3">
        <h4>Resultado <code>Foram encontrados {{$search->count()}}</code></h4>
        <div class="row">
            @foreach($search as $user)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <p>
                        <a href="{{route('user.show', $user->id)}}">
                            {{$user->name}}
                            <br/>
                            <code>{{$user->created_at}}</code>
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                            <a class="btn btn-info" href="{{route('user.edit', ['user'=> $user->id])}}" type="button">Editar</a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                            <form action="{{route('user.destroy', ['user'=> $user->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div class="bg-light p-3">
        <h4><code>Query {{$sql}}</code></h4>
    </div>
@endsection
