<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @if(Route::current()->getName() === 'post.edit' || Route::current()->getName() === 'post.create')
                            {{ isset($post) ? 'Editar postagem' : 'Criar postagem' }}
                        @elseif(Route::current()->getName() === 'category.edit' || Route::current()->getName() === 'category.create')
                            {{ isset($category) ? 'Editar categoria' : 'Criar categoria' }}
                        @elseif(Route::current()->getName() === 'user.edit' || Route::current()->getName() === 'user.create')
                            {{ isset($user) ? 'Editar usuário' : 'Criar usuário' }}
                        @endif
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>