@extends('layouts.dafault')

@section('title', 'Lista de usuários')

@section('content')
    <main role="main">

        <div class="bg-light p-3">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <p><i class="ti-user"></i>
                            <a href="{{route('category.show', ['category'=> $category->id])}}">
                                {{$category->title}} - <small class="small bg-light text-danger">Total posts - {{$category->posts->count()}}</small>
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
{{--        <div>{{$users->links()}}</div>--}}
    </main>
@endsection

@push('script')

@endpush