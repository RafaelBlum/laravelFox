<div class="mt-5 pt-5 pb-5 footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xs-12 about-company">
                <img src="{{asset('themes/images/config/studio2.png')}}" alt="fox_logo" width="190">
                <p class="pr-5 text-white-50">{{CONF_DESCRIPTION}}</p>
                <p class="social_midias">
                    <a href="{{CONF_URL_LINKEDIN}}"><i class="ti-linkedin"> </i></a>
                    <a href="{{CONF_URL_TWITTER}}"><i class="ti-twitter"> </i></a>
                    <a href="{{CONF_URL_GITHUB}}"><i class="ti-github"> </i></a>
                    <a href="{{CONF_URL_INSTAGRAM}}"><i class="ti-instagram"> </i></a>
                    <a href="{{CONF_URL_YOUTUBE}}"><i class="ti-youtube"> </i></a>
                </p>

            </div>
            <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3">Links</h4>
                <ul class="m-0 p-0">
                    <li><a href="{{route('post.index')}}">Notícias</a></li>
                    <li><a href="{{route('user.index')}}">Usuários</a></li>
                    <li><a href="{{route('category.index')}}">Categorias</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-xs-12 location">
                <h4 class="mt-lg-0 mt-sm-4">Location</h4>
                <p>22, Lorem ipsum dolor, consectetur adipiscing</p>
                <p class="mb-0"><i class="fa fa-phone mr-3"></i>(55) 5555-5555</p>
                <p><i class="fa fa-envelope-o mr-3"></i>{{CONF_EMAIL}}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col copyright">
                <p class="">
                    <small class="text-white-50">Visite nosso canal no youtube <a href="#">{{CONF_CANAL_TUBE}}</a> ou nosso gitHub <a href="#">{{CONF_DEV_NAME}}</a> © {{date('Y')}}.</small>
                    <small class="float-right text-white-50"><a href="#">Topo</a></small></p>
            </div>
        </div>
    </div>
</div>
