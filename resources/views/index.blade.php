@extends('layouts.dafault')

@section('title', 'Home - LaraFox')
@push('style')
    <style>
        /* =========== TOOLTIP ==================*/
        .tooltip-msg{
            position: relative;
            top: 0;
            z-index: 1;
            background: #fff;
            color: #fff;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 25px;
            opacity: 0;
            pointer-events: none;
            box-shadow: 0px 10px 10px rgba(0,0,0,0.1);
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .msg a{
            text-decoration: none;
        }

        .icon:hover .tooltip-msg{
            top: -10px;
            opacity: 1;
            pointer-events: auto;
        }
        .icon .tooltip-msg:before{
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            background: #fff;
            left: 50%;
            bottom: -6px;
            transform: translateX(-50%) rotate(45deg);
            transition: 0.4s cubic-bezier(95, 57, 248, 0.49);
            color: red;

        }

        .icon:hover .tooltip-msg{
            text-shadow: 0px -1px 0px rgba(0,0,0,0.4);
        }

        .msg:hover .tooltip-msg,
        .msg:hover .tooltip-msg:before{
            background: rgba(95, 57, 248, 0.49);
        }

        .icon .tooltip-msg{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon .tooltip-msg i{
            margin-right: 5px;
            color: #FFFFFF;
        }
    </style>
@endpush
@section('content')
        <main role="main" class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 blog-main">
                    {{-- LAST POST--}}
                    <article>
                        {{-- POST IMAGE --}}
                        <figure class="mb-4">
                            <img style="width: 100%; height: 400px;" class="img-fluid rounded" src="/storage/{{$last_post->cover}}" alt="Cover last post" />
                        </figure>
                        {{-- POST CABEÇALHO --}}
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1"><a href="{{route('post.show', ['post'=> $last_post->id])}}">{{$last_post->title}}</a></h1>
                            <div class="text-muted fst-italic mb-2">Postado em {{date('d/m/Y', strtotime($last_post->created_at))}} por <a href="{{route('user.show', ['user'=> $last_post->user->id])}}">{{$last_post->user->name}}</a></div>
                            {{-- CATEGORIES --}}
                            @foreach($last_post->categorias as $category)
                                <a class="badge bg-light text-decoration-none link-light" href="{{route('category.show', ["category" => $category->id])}}">{{$category->title}}</a>
                            @endforeach
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
            @foreach($posts as $post)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <a href="{{route('user.show', ['user'=> $post->user->id])}}" class="d-inline-block mb-2 text-primary">
                                <small class="text-muted">{{$post->user->name}}</small>
                            </a>
                            <h3 class="mb-0">
                                <a class="text-dark" href="{{route('post.show', ['post'=> $post->id])}}">{{Str::limit($post->title, 16)}}</a>
                            </h3>
                            <div class="mb-1 text-muted">{{date('d/m/Y', strtotime($post->created_at))}}</div>
                            <p class="card-text mb-auto">{{Str::limit($post->content, 70)}}</p>
                            <a href="{{route('post.show', ['post'=> $post->id])}}">Continue a ler...</a>
                        </div>
                        <img width="200" class="card-img-right flex-auto d-none d-lg-block" src="/storage/{{$post->cover}}" data-src="{{$post->cover}}" alt="Card image cap">
                    </div>
                </div>
            @endforeach
        </div>



        <h3 class="p-3 mb-4 font-italic border-top text-center block icon msg">

            <a href="{{route('post.index')}}">
                <div class="tooltip-msg">
                    <i class="fa fa-share-alt"></i> Veja mais
                </div>
                <i class="ti ti-more-alt text-lg-center"></i>
            </a>
        </h3>
@endsection
