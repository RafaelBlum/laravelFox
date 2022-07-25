@extends('layouts.dafault')

@section('title', 'Perfil '.  $user->name)
@push('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
        .profile {
            position: relative;
            margin-bottom: 50px;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            z-index: 1;
            border-radius: 15px;
            -webkit-box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
            box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
        }
        .profile .advisor_thumb {
            position: relative;
            z-index: 1;
            border-radius: 15px 15px 0 0;
            margin: 0 auto;
            padding: 30px 30px 0 30px;
            background-color: #3f43fd;
            overflow: hidden;
        }
        .profile .advisor_thumb::after {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            position: absolute;
            width: 150%;
            height: 80px;
            bottom: -45px;
            left: -25%;
            content: "";
            background-color: #ffffff;
            -webkit-transform: rotate(-15deg);
            transform: rotate(-15deg);
        }
        @media only screen and (max-width: 575px) {
            .profile .advisor_thumb::after {
                height: 160px;
                bottom: -90px;
            }
        }
        .profile .advisor_thumb .social-info {
            position: absolute;
            z-index: 1;
            width: 100%;
            bottom: 0;
            right: 30px;
            text-align: right;
        }
        .profile .advisor_thumb .social-info a {
            font-size: 14px;
            color: #020710;
            padding: 0 5px;
        }
        .profile .advisor_thumb .social-info a:hover,
        .profile .advisor_thumb .social-info a:focus {
            color: #3f43fd;
        }
        .profile .advisor_thumb .social-info a:last-child {
            padding-right: 0;
        }
        .profile .single_advisor_details_info {
            position: relative;
            z-index: 1;
            padding: 30px;
            text-align: right;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            border-radius: 0 0 15px 15px;
            background-color: #ffffff;
        }
        .profile .single_advisor_details_info::after {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            position: absolute;
            z-index: 1;
            width: 50px;
            height: 3px;
            background-color: #3f43fd;
            content: "";
            top: 12px;
            right: 30px;
        }
        .profile .single_advisor_details_info h6 {
            margin-bottom: 0.25rem;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
        }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .profile .single_advisor_details_info h6 {
                font-size: 14px;
            }
        }
        .single_advisor_profile .single_advisor_details_info p {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            margin-bottom: 0;
            font-size: 14px;
        }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .profile .single_advisor_details_info p {
                font-size: 12px;
            }
        }
        .profile:hover .advisor_thumb::after,
        .profile:focus .advisor_thumb::after {
            background-color: #070a57;
        }
        .profile:hover .advisor_thumb .social-info a,
        .profile:focus .advisor_thumb .social-info a {
            color: #ffffff;
        }
        .profile:hover .advisor_thumb .social-info a:hover,
        .profile:hover .advisor_thumb .social-info a:focus,
        .profile:focus .advisor_thumb .social-info a:hover,
        .profile:focus .advisor_thumb .social-info a:focus {
            color: #ffffff;
        }
        .profile:hover .single_advisor_details_info,
        .profile:focus .single_advisor_details_info {
            background-color: #070a57;
        }
        .profile:hover .single_advisor_details_info::after,
        .profile:focus .single_advisor_details_info::after {
            background-color: #ffffff;
        }
        .profile:hover .single_advisor_details_info h6,
        .profile:focus .single_advisor_details_info h6 {
            color: #ffffff;
        }
        .profile:hover .single_advisor_details_info p,
        .profile:focus .single_advisor_details_info p {
            color: #ffffff;
        }
    </style>
@endpush
@section('content')
    <main role="main">


                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="profile wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                        <!-- Team Thumb-->
                                        <div class="advisor_thumb"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                            <!-- Social Info-->
                                            <div class="social-info"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                                        </div>
                                        <!-- Team Details-->
                                        <div class="single_advisor_details_info">
                                            <h6>{{$user->name}}</h6>
                                            <p class="designation">UI Designer</p>
                                            <a class="badge text-success bg-white text-decoration-none" href="{{route('user.edit', ['user'=> $user->id])}}">Editar</a>
                                            <a class="badge text-danger bg-white text-decoration-none" href="{{route('user.index')}}">Voltar</a>
                                        </div>


                                    </div>
                                </div>

                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <h1 class="jumbotron-heading">{{$user->name}}</h1>
                                <code class="text-info">{{date('d/m/Y', strtotime($user->created_at))}}</code>
                                <p class="lead text-muted">{{$user->address->street}}, nº {{$user->address->number}} / {{$user->address->city}}</p>
                            </div>
                        </div>
                    </div>



                </div>


            <section class="text-center album">
                <div class="container">
                    <h1 class="jumbotron-heading">Meus posts</h1>

                    @if($user->posts->count() > 0)
                        <div class="row">
                            @foreach($user->posts as $p)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img class="card-img-top rounded-top" src="/storage/{{$p->cover}}" data-src="{{$p->cover}}" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">{{Str::limit($p->content, 70)}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{route('post.show', ['post'=> $p->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                                    <a href="{{route('post.edit', ['post'=> $p])}}" type="button" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                </div>
                                                <img class="rounded-circle border-danger" src="/storage/{{$p->cover}}" width=20" height="20" alt="User Image">
                                                <small class="text-muted">{{date('d/m/Y', strtotime($p->created_at))}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <p class="card-text">Este usuário não criou postagens!</p>
                            </div>
                        </div>

                    @endif
                </div>
            </section>
            <hr>

    </main>
@endsection
