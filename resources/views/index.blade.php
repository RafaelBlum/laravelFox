@extends('layouts.dafault')

@section('title', 'Home - LaraFox')

@section('content')
        <main role="main" class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 blog-main">
                    {{-- POST --}}
                    <article>
                        {{-- POST IMAGE --}}
                        <figure class="mb-4">
                            <img style="width: 100%;" class="img-fluid rounded" src="/storage/{{$last_post->cover}}" alt="..." /></figure>
                        {{-- POST CABEÇALHO --}}
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1"><a href="{{route('post.show', ['post'=> $last_post->id])}}">{{$last_post->title}}</a></h1>
                            <div class="text-muted fst-italic mb-2">Postado em {{date('d/m/Y', strtotime($last_post->created_at))}} por <a href="{{route('user.show', ['user'=> $last_post->user->id])}}">{{$last_post->user->name}}</a></div>
                            {{-- CATEGORIES --}}
                            <a class="badge bg-light text-decoration-none link-light" href="#">Web Design</a>
                            <a class="badge bg-light text-decoration-none link-light" href="#">Freebies</a>
{{--                            @auth--}}
                                <a class="badge text-success bg-light text-decoration-none" href="{{route('post.edit', ['post'=> $last_post])}}">Editar</a>
                                <a class="badge text-danger bg-light text-decoration-none" href="{{route('post.destroy', ['post'=> $last_post])}}">Deletar</a>
{{--                            @endauth--}}
                        </header>
                       {{-- POST CONTENT --}}
                        <section class="mb-5">
                            <div class="htmlcontent">
                                <?= $last_post->content;?>
                            </div>
                        </section>
                    </article>
                </div>
            </div>
            <hr class="mb-5">
        </main>

        <div class="row mb-2">
            @foreach($posts as $p)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <a href="{{route('user.show', ['user'=> $p->user->id])}}" class="d-inline-block mb-2 text-primary">
                                <small class="text-muted">{{$p->user->name}}</small>
                            </a>
                            <h3 class="mb-0">
                                <a class="text-dark" href="{{route('post.show', ['post'=> $p->id])}}">{{Str::limit($p->title, 16)}}</a>
                            </h3>
                            <div class="mb-1 text-muted">{{date('d/m/Y', strtotime($p->created_at))}}</div>
                            <p class="card-text mb-auto">{{Str::limit($p->content, 70)}}</p>
                            <a href="{{route('post.show', ['post'=> $p->id])}}">Continue a ler...</a>
                        </div>
                        <img width="200" class="card-img-right flex-auto d-none d-lg-block" src="/storage/{{$p->cover}}" data-src="{{$p->cover}}" alt="Card image cap">
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="p-3 mb-4 font-italic border-top text-center">
            <a href="{{route('post.index')}}">Ver mais...</a>
        </h3>
@endsection
