@extends('layouts.dafault')

@section('title', 'Notícias Fox')

@section('content')
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Lista de notícias</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="{{route('post.create')}}" class="btn btn-primary my-2">Criar notícia</a>
                    <a href="{{route('user.create')}}" class="btn btn-secondary my-2">Criar usuário</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach($posts as $p)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <img class="card-img-top rounded-top" src="/storage/{{$p->cover}}" data-src="{{$p->cover}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"><?= Str::limit($p->content, 90);?></p>
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
            </div>
        </div>
    </main>
@endsection

@push('script')
    {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--    @if(session('eliminar') == 'ok')--}}
{{--        <script>--}}
{{--            Swal.fire(--}}
{{--                'Deletada!',--}}
{{--                'Esta notícia foi excluida com sucesso!!',--}}
{{--                'success'--}}
{{--            )--}}
{{--        </script>--}}
{{--    @endif--}}

    <script>

        $('.form-delete').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Deseja realmente deletar?',
                text: "A notícia será deletada definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            });
        });
    </script>
@endpush