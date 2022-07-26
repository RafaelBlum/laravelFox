@extends('layouts.dafault')

@section('title', 'Lista de usuários')

@section('content')

    <main role="main">
        <div class="bg-light p-3">
            <form action="{{route('user.find')}}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="mysearch" aria-describedby="emailHelp"
                           placeholder="Busca..." required name="name">
                    <small id="emailHelp" class="form-text text-muted"><code>Busca por usuário</code></small>
                </div>
                <input class="btn btn-block btn-info" type="submit" value="Buscar">
            </form>
        </div>

        <div class="bg-light p-3">
            <div class="row">
                @foreach($users as $u)
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <p><i class="ti-user"></i>
                            <a href="{{route('user.show', ['user'=> $u->id])}}">
                                {{$u->name}} - <small class="small bg-light text-danger">Total posts - {{$u->posts->count()}}</small>
                                <br/>
                            </a>
                            <code><i class="ti-timer"> </i>{{date('d/m/Y', strtotime($u->created_at))}}</code>
                            <br/>
                            <i class="ti-agenda"> </i> <code>{{$u->address->street}}, nº {{$u->address->number}} / {{$u->address->city}}</code>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                                <a class="btn btn-info btn-sm btn-block" href="{{route('user.edit', ['user'=> $u->id])}}" type="button">Editar</a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                                <form class="form-delete" action="{{route('user.destroy', ['user'=> $u->id])}}" method="POST">
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
        <div>{{$users->links()}}</div>
    </main>
@endsection

@push('script')
    {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- onkeyup="mySearchUser()"--}}
    <script>
        $('.form-delete').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Deseja realmente deletar?',
                text: "O usuário será deletada definitivamente!",
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

        function mySearchUser() {
            var input, filter, table, tr, td, i, txt;
            input = document.getElementById('mysearch');
            filter = input.value.toUpperCase();
            table = document.getElementById('tableUser');
            tr = table.getElementsByTagName("div");

            for(i=0; i< tr.length; i++){
                td = tr[i].getElementsByClassName('myuser')[0];

                if(td){
                    txt = td.textContent || td.innerText;
                    if(txt.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endpush                         