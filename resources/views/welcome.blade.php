<x-layout>
    <div class="scroll-navbar" style="margin-top: -60px; color: pink; background-color: purple;">
        <ul>
            @foreach ($latestAds as $index => $ad)
                <li class="{{ $index === 0 ? 'first-item' : '' }}" >
                    @php
                        $colors = ['#FF5733', '#33FF57', '#5733FF', '#33FFFF', '#FF33C7']; // Colores claros diferentes
                        $currentColor = $colors[$index % count($colors)];
                    @endphp
                    <a style="color: {{ $currentColor }};" href="{{ route('ads.show', ['id' => $ad->id]) }}" class="{{ $index % 2 === 0 ? 'even-link' : 'odd-link' }}">"{{ $ad->title }}"</a>
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
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, #ffffff, #a94991);
        }

        /* Estilos de las cards de anuncios */
        .ad-card {
            border: 1px solid #ccc;
            padding: 15px; /* Ajusta el padding */
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #e74c3c;
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
            margin: 5px 0; /* Ajusta los márgenes vertical y horizontal */
        }

        .ad-subtitle {
            color: #101ee6;
            font-size: 1rem;
            margin: 5px 0; /* Ajusta los márgenes vertical y horizontal */
        }

        .ad-image {
            max-height: 200px;
            width: 100%;
            margin-bottom: 10px; /* Ajusta el margen inferior */
        }

        .ad-content {
            color: #080808;
            margin: 5px 0; /* Ajusta los márgenes vertical y horizontal */
        }
    </style>


    <div class="mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h2 class="mb-4">Welcome, {{ Auth::user()->name }}!</h2>
                            <p>{{ __('You are logged in!') }}</p>

                            <div class="mt-4">
                                <h4>Your Dashboard Content</h4>
                                <p>This is where you can manage your profile and ads.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="imageCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $carouselImages = [
                            '1.jpg',
                            '2.jpg',
                            '4.jpg',
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

        <div class="container mt-4">
            <h1 class="text-center h1welcome">Últimas publicaciones</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
                
                @foreach ($latestAds as $ad)
                    <div class="col mb-3">
                        <div class="card ad-card">
                            <div class="card-body text-center">
                                <h4 class="ad-title">{{ $ad->title }}</h4>
                                <h5 class="ad-subtitle">{{ $ad->subtitle }}</h5>
                                @if ($ad->image)
                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image" style="max-height: 200px;">
                                @endif
                                <p class="ad-content">{{ substr($ad->content, 0, 100) }} ... <a href="{{ route('ads.show', ['id' => $ad->id]) }}">Ver más</a></p>
                                <p>Category: <a href="{{ route('ads.index', ['category' => $ad->category]) }}">{{ ucfirst($ad->category) }}</a></p>
                                <p>Created at: {{ $ad->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($latestAds->isEmpty())
                <p class="text-center">No latest ads available.</p>
            @endif
        </div>
    </div>
</x-layout>
