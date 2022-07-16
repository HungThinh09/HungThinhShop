<div id="banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < count($banners); $i++)
            <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}" class="{{$i == 0 ? "active": ""}}"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $key =>$banner)
            <div class="carousel-item {{$key==0 ? "active":""}}">
                <img src="{{ asset('uploads/banner/'.$banner->image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>{{$banner->bannerName}}</h5> --}}
                    {{-- <p>Some representative placeholder content for the first slide.</p> --}}
                </div>
            </div>
            @endforeach 
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>