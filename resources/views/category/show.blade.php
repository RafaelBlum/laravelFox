@extends('layouts.dafault')

@section('title', 'Perfil '.  $category->title)

@section('content')
    <main role="main">


        <div class="container">
            <div class="jumbotron-heading">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <!-- Team Details-->
                            <div class="single_advisor_details_info">
                                <h1>{{$category->title}}</h1>
                                <p class="designation">{{$category->description}}</p>
                                <a class="badge text-success bg-white text-decoration-none" href="{{route('category.edit', ['category'=> $category->id])}}">Editar</a>
                                <a class="badge text-danger bg-white text-decoration-none" href="{{route('category.index')}}">Voltar</a>
                            </div>
                    </div>
                </div>
            </div>



        </div>


        <section class="text-center album">
            <div class="container">
                <h5 class="jumbotron-heading">Postagens</h5>

                @if($category->posts->count() > 0)
                    <div class="row">
                        @foreach($category->posts as $p)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="card-img-top rounded-top" src="/storage/{{$p->cover}}" data-src="{{$p->cover}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">{{Str::limit($p->content, 70)}}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group mr-2">
                                                <a href="{{route('post.show', ['post'=> $p->id])}}" type="button" class="btn btn-sm btn-outline-info">Visualizar</a>
                                                <a href="{{route('post.edit', ['post'=> $p])}}" type="button" class="btn btn-sm btn-outline-success">Editar</a>
                                                <form class="form-delete" action="{{route('post.destroy', ['post'=> $p])}}" method="POST">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-info">delete</button>
                                                </form>
                                            </div>
                                            <img class="rounded-circle border-danger" src="/storage/{{$p->cover}}" width=20" height="20" alt="User Image">
                                            <small class="text-muted">{{date('Y', strtotime($p->created_at))}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">Esta categoria não esta ligada a uma postagem.</p>
                        </div>
                    </div>

                @endif
            </div>
        </section>
        <hr>

    </main>
@endsection
