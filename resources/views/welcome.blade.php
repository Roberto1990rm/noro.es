<x-layout>
    <div class="scroll-navbar animation-scroll" style="margin-top: -60px; color: pink; background-color: purple;">
        <ul>
            @foreach ($latestAds as $index => $ad)
                <li class="{{ $index === 0 ? 'first-item' : '' }}">
                    @php
                        $colors = ['#FF5733', '#33FF57', '#FFFFFF', '#FF33C7'];
                        $currentColor = $colors[$index % count($colors)];
                    @endphp
                    <a style="color: {{ $currentColor }};" href="{{ route('ads.show', ['id' => $ad->id]) }}" class="{{ $index % 2 === 0 ? 'even-link' : 'odd-link' }}">{{ $ad->title }}</a>
                    @if (!$loop->last) | @endif
                </li>
            @endforeach
        </ul>
    </div>
    

<div class="container-outer">
    <div class="container-inner">
        <div class="row justify-content-center">
            <div class="col-md-8 pb-5 colored-box">
               

                <div class="search-form" style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 20px;">
                    <form action="{{ route('ads.index') }}" method="GET">
                        <input type="text" name="search" placeholder="Buscar anuncios...">
                        <button type="submit">Buscar</button>
                    </form>
                </div>

                <div class="mb-4" style="color: rgb(0, 0, 0); font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; text-align: center;">
                    <h2 style="font-size: 32px;">
                        @if ($selectedCategory)
                            {{ __('Lo último:') }} {{ ucfirst($selectedCategory) }} 
                        @else
                            {{ __('Lo más reciente') }}
                        @endif
                    </h2>
                </div>

                <div class="row justify-content-center" >
                    @foreach ($latestAds as $ad)
                        <div>
                            <div class="ad-container" style="border-bottom: 2px solid #080808; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5); background-color: white;">
                                <div class="ad-category text-muted" style="display: flex; justify-content:center;">
                                    <a href="{{ route('ads.index', ['category' => $ad->category]) }}" class="ad-category text-muted">
                                        <strong>Categoría:</strong> {{ ucfirst($ad->category) }}
                                    </a>
                                </div>
                                
                                <h4 style="display: flex; justify-content:center;" class="ad-title" style="color:#080808">{{ $ad->title }}</h4>
                                <p style="display: flex; justify-content:center;" class="ad-subtitle" style="color:#101ee6;">{{ $ad->subtitle }}</p>

                                <div class="carousel slide mb-3" data-bs-ride="carousel" id="carousel-{{ $ad->id }}">
                                    <div class="carousel-inner">
                                        @if ($ad->video_url)
                                            <div class="carousel-item active">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <div class="responsive-video" style="display: flex; justify-content:center;">
                                                        {!! $ad->video_url !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($ad->image)
                                        <div class="carousel-item active">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->image }}" class="img-fluid ad-image mb-3" style="max-height: 1000px; max-width: 600px;">
                                            </div>
                                        </div>
                                        
                                        @endif

                                        @foreach ($ad->relatedImages as $relatedImage)
                                        <div class="carousel-item">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ asset('storage/' . $relatedImage->image_path) }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 1000px; max-width: 600px;">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                </div>

                                <p style="display: flex; justify-content:center;" class="ad-content" style="color:#080808;">{{ Str::limit($ad->content, 30) }} <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="text-primary">Ver más</a></p>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    @auth
                                        <form class="like-form" action="{{ route('ads.like', ['id' => $ad->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-link like-button" data-ad-id="{{ $ad->id }}">
                                                <i class="fas fa-thumbs-up text-primary"></i>
                                            </button>
                                        </form>
                                    @endauth
                                    <p class="ad-likes text-center">
                                        <i class="fas fa-heart text-danger"></i> <span class="like-count">{{ $ad->likes_count }}</span>
                                    </p>
                                </div>
                                
                                
                        </div>
                    @endforeach
                </div>

                @if ($latestAds->isEmpty())
                    <p class="text-muted">No hay anuncios disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: -40px;">
    <div id="imageCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $carouselImages = [
                    '4.jpg',
                    '1.jpg',
                    '2.jpg',
                ];
            @endphp
            @foreach ($carouselImages as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img  src="{{ asset('images/' . $image) }}" class="d-block w-100" style="object-fit: cover; max-height: 1100px;" alt="Image {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>

</div>
</x-layout>


