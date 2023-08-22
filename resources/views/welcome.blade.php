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
    
    <style>
        /* Estilos de las cards */
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background: linear-gradient(45deg, #deedae, #e0e0e0);
            padding: -20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, #ffffff, #a94991);
        }

        /* Estilos de las cards de anuncios */
        .ad-card {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #e74c3c;
            margin: 10px;
        }

        .ad-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background-color: #3498db;
        }

        /* Ajusta los márgenes de los elementos internos */
        .ad-title {
            color: #080808;
            font-size: 1.25rem;
            margin: 5px 0;
        }

        .ad-subtitle {
            color: #101ee6;
            font-size: 1rem;
            margin: 5px 0;
        }

        .ad-image {
            max-height: 200px;
            width: 100%;
            margin-bottom: 10px;
        }

        .ad-content {
            color: #080808;
            margin: 0px 0;
        }

        @media (max-width: 767px) {
            .row-cols-md-2 .col {
                flex-basis: 50%;
                max-width: 50%;
            }
        }


        .embed-responsive .responsive-video {
    position: relative;
    padding-bottom: 56.25%; /* Maintain the aspect ratio of 16:9 */
    height: 0;
    overflow: hidden;
}

.embed-responsive .responsive-video iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 300px;
    border: 0; /* Remove border for the iframe */
}
    </style>

<div class="container-outer">
        
    <div class="container-inner">
        <div class="row">
            <div class="col-md-8 pb-5 colored-box">
            
                
            <h1 class="mb-4">
                @if ($selectedCategory)
                    {{ __('Lo último:') }} {{ ucfirst($selectedCategory) }} 
                @else
                    {{ __('Novedades') }}
                @endif
            </h1>
            <div class="search-form" style="display: flex; justify-content: center; margin-bottom: 5px;">
                <form action="{{ route('ads.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Buscar anuncios...">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <div class="card ad-container">
                <!-- ... Resto del contenido ... -->
                <div class="card-body bgcolor" style="padding: 10px;">
                    <!-- ... Resto del contenido ... -->
                    <div class="card-body" style="text-align: center; ">
                        <div class="row bgcolor" style="padding-top: 10px;"  >
                            @foreach ($ads as $ad)
                                <div class="col-md-6 mb-4">
                                    <div class="ad-container">
                                        <a href="{{ route('ads.index', ['category' => $ad->category]) }}" class="ad-category text-muted">
                                            <strong>Category:</strong> {{ ucfirst($ad->category) }}
                                        </a>
                                        
                                        <h4 class="ad-title" style="color:#080808">{{ $ad->title }}</h4>
                                        <p class="ad-subtitle" style="color:#101ee6;">{{ $ad->subtitle }}</p>
                                        
                                    <div class="carousel slide mb-3" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @if ($ad->video_url)
                                                <div class="carousel-item active">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <div class="responsive-video">
                                                            {!! $ad->video_url !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        
                                            @if (!$ad->video_url && $ad->image)
                                                <div class="carousel-item active"> <!-- Cambia "active" a "carousel-item" -->
                                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->image }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                                </div>
                                            @endif
    
    @foreach ($ad->relatedImages as $relatedImage)
        <div class="carousel-item">
            <img src="{{ asset('storage/' . $relatedImage->image_path) }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
        </div>
    @endforeach
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>


</div>



                                        <p class="ad-content" style="color:#080808;">{{ Str::limit($ad->content, 30) }} <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="text-primary">Read more</a></p>
                                       
                                        @if (Auth::check() && Auth::user()->id === $ad->user_id)
                                            <a href="{{ route('ads.edit', ['id' => $ad->id]) }}" class="btn btn-primary">Edit Ad</a>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            @auth
                                                <form class="like-form" action="{{ route('ads.like', ['id' => $ad->id]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-link like-button" data-ad-id="{{ $ad->id }}">
                                                        <i class="fas fa-thumbs-up text-primary"></i>
                                                    </button>
                                                </form>
                                            @endauth
                                            <p class="ad-likes"><i class="fas fa-heart text-danger"></i> <span class="like-count">{{ $ad->likes_count }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($ads->isEmpty())
                            <p class="text-muted">No ads available.</p>
                        @endif
                    </div>
                </div>
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
                        <img src="{{ asset('images/' . $image) }}" class="d-block w-100" alt="Image {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</x-layout>
