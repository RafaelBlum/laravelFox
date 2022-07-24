@extends('layouts.dafault')

@section('title', isset($post) ? 'LaraFox - Editar '. $post->title : 'LaraFox - Criar notícia')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
@endpush

@section('content')
    {{-- CABEÇALHO BREADCRUMB--}}
    @include('layouts.partials.breadcrumb')

    <div class="bg-light p-3">

        <form action="{{isset($post) ? route('post.update', ['post' => $post->id]) : route('post.store')}}"
              method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 mb-3">
                    <div class="row">
                        {{-- TITLE --}}
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <label for="title">Titulo <span class=" text-danger">*</span></label>
                            <input value="{{$post->title ?? old('title')}}"
                                   name="title"
                                   type="text"
                                   class="form-control form-control-sm @error('title') is-invalid @enderror"
                                   id="title"
                                   aria-describedby="title"
                                   autofocus
                                   placeholder="Titulo"
                                   required>
                        </div>

                        {{-- CONTENT --}}
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <div class="form-group">
                                <label class="text-black-50 font-weight-bold text-md-left" for="conteudo">Descrições</label>
                                <textarea class="form-control summer" id="conteudo" name="description" required="required">{{isset($post) ? $post->content : ''}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                            {{-- CATEGORIA--}}
                            <div class="form-group">
                                <select id="card_id"
                                        class="js-multiple form-control form-control-sm"
                                        style="width: 100%;"
                                        name="cat[]"
                                        multiple="multiple"
                                        placeholder="Escolha quais categorias">

                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}"
                                                @if(isset($post))
                                                @foreach($post->categorias as $cat)
                                                @if($categoria->id == $cat->id)
                                                selected="selected"
                                                @endif
                                                @endforeach
                                                @endif
                                        >{{$categoria->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        {{-- CATEGORIA--}}

                        {{--COVER SELECT--}}
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="arquivo" onchange="loadfile(event)">
                                <label class="custom-file-label" for="avatar">Selecione uma imagem</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                    <figure id="upload" class="figure file-upload-wrapper">
                        <img class="figure-img img-fluid z-depth-1 rounded"id="output" width="100%"
                             src="{{isset($post) ? "/storage/".$post->cover : '/storage/capa_posts/capa_default.jpg'}}"
                             alt="capa de noticias">
                    </figure>
                </div>
            </div>



            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">{{isset($post) ? 'Atualizar postagem' : 'Criar nova postagem'}}</button>
            <small id="emailHelp" class="form-text text-danger">* campos obrigatórios</small>
        </form>
    </div>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script>
            {{-- IMAGE PREVIEW --}}
            var loadfile = function(event){
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            }

            {{-- SELECT2 TO CATEGORY --}}
            $(document).ready(function() {
                $('.js-multiple').select2();
            });
        </script>

    @endpush
@endsection
