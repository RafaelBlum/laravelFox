@extends('layouts.dafault')

@section('title', $post->title)

@section('content')
    <main role="main" class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">
                    {{-- POST --}}
                    <article>
                        {{-- POST CABEÇALHO --}}
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                            <div class="text-muted fst-italic mb-2">Postado em {{date('d/m/Y', strtotime($post->created_at))}} por <a href="{{route('user.show', ['user'=> $post->user->id])}}">{{$post->user->name}}</a>  </div>
                            {{-- CATEGORIES --}}
                            @foreach($post->categorias as $category)
                                <a class="badge bg-light text-decoration-none link-light" href="{{route('category.show', ['category'=> $category->id])}}">{{$category->title}}</a>
                            @endforeach
                            @auth
                                <a class="badge text-success bg-light text-decoration-none" href="{{route('post.edit', ['post'=> $post])}}">Editar</a>
                                <a class="badge text-danger bg-light text-decoration-none" href="{{route('post.delete', ['post'=> $post])}}">Deletar</a>
                            @endauth
                        </header>
                        {{-- POST IMAGE --}}
                        <figure class="mb-4"><img class="img-fluid rounded" src="/storage/{{$post->cover}}" alt="..." /></figure>
                        {{-- POST CONTENT --}}
                        <section class="mb-5">
                            <div class="htmlcontent">
                                <?= $post->content;?>
                            </div>
                        </section>
                    </article>

                    {{-- COMMENT --}}
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Coméntarios..."></textarea></form>

                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never
                                        be private enterprise. Because the space frontier is dangerous, and it's
                                        expensive, and it has unquantified risks.
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market
                                                evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </main>


@endsection
