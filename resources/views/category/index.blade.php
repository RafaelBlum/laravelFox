@extends('layouts.dafault')

@section('title', 'Lista de categorias')

@section('content')
    <main role="main">

        <div class="bg-light p-3">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <p><i class="ti-archive"></i>
                            <a href="{{route('category.show', ['category'=> $category->id])}}">
                                {{$category->title}}
                                <small class="badge bg-warning text-white float-right">Total posts - {{$category->posts->count()}}</small>
                                <br/>
                            </a>
                            <br/>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                                <a class="btn btn-info btn-sm btn-block" href="{{route('category.edit', ['category'=> $category->id])}}" type="button">Editar</a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                                <form class="form-delete" action="{{route('category.destroy', ['category'=> $category->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-block" type="submit">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <hr>
        <div>{{$categories->links()}}</div>
    </main>
@endsection

@push('script')
    {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        $('.form-delete').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Deseja realmente deletar?',
                text: "A categoria será deletada definitivamente!",
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
