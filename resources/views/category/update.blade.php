@extends('layouts.dafault')

@section('title', isset($category) ? 'LaraFox - Editar ' . $category->title : 'LaraFox - Criar categoria')

@section('content')
    {{-- CABEÇALHO BREADCRUMB--}}
    @include('layouts.partials.breadcrumb')

    <div class="bg-light p-3">

        <form action="{{isset($category) ? route('category.update', ['category' => $category->id]) : route('category.store')}}"
              method="post">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                    <div class="row">
                        {{-- CATEGORY TITLE --}}
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <label for="title">Titulo <span class=" text-danger">*</span></label>
                            <input value="{{$category->title ?? old('title')}}"
                                   name="title"
                                   type="text"
                                   class="form-control form-control-sm @error('title') is-invalid @enderror"
                                   id="title"
                                   aria-describedby="title"
                                   autofocus
                                   placeholder="Titulo"
                                   required>
                        </div>

                        {{-- CATEGORY DESCRIPTION --}}
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <div class="form-group">
                                <label class="text-black-50 font-weight-bold text-md-left" for="conteudo">Descrições</label>
                                <textarea class="form-control summer" maxlength="255" minlength="10" id="conteudo" name="description" required="required">{{isset($category) ? $category->description : ''}}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">{{isset($category) ? 'Atualizar categoria' : 'Criar nova categoria'}}</button>
                    <small id="emailHelp" class="form-text text-danger">* campos obrigatórios</small>
                </div>
            </div>
        </form>
    </div>
@endsection
