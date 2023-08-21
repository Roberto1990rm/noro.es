<x-layout>
      
    <div class="scroll-navbar scroll-navbar animation-scroll" style="margin-top: -60px; color: pink; background-color: purple;">
        <ul>
            @foreach ($latestAds as $index => $ad)
                <li class="{{ $index === 0 ? 'first-item' : '' }}" >
                    @php
                        $colors = ['#FF5733', '#33FF57', '#FFFFFF', '#FF33C7']; // Colores claros diferentes
                        $currentColor = $colors[$index % count($colors)];
                    @endphp
                    <a style="color: {{ $currentColor }};" href="{{ route('ads.show', ['id' => $ad->id]) }}" class="{{ $index % 2 === 0 ? 'even-link' : 'odd-link' }}">"{{ $ad->title }}"</a>
                    @if (!$loop->last) | @endif
                </li>
            @endforeach
        </ul>
    </div>
 

<div class="container">
    <div class="row">
        <div class="col-md-8 pb-5 colored-box" style="margin-right: 30px;">
                <h1 class="mb-4">
                    @if ($selectedCategory)
                        {{ __('Últimas noticias:') }} {{ ucfirst($selectedCategory) }} 
                    @else
                        {{ __('Últimas noticias') }}
                    @endif
                </h1>
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Professional News') }}</div>
                    <div class="card-body">
                        <form action="{{ route('ads.index') }}" method="GET" class="mb-3">
                            <label for="category" class="form-label">Filter by Category:</label>
                            <div class="input-group">
                                <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
                                    <option value="" disabled selected>{{ __('Select a category') }}</option>
                                    <option value="nacional">{{ __('Nacional') }}</option>
                                    <option value="internacional">{{ __('Internacional') }}</option>
                                    <option value="politica">{{ __('Politica') }}</option>
                                    <option value="economia">{{ __('Economia') }}</option>
                                    <option value="tecnologia">{{ __('Tecnologia') }}</option>
                                    <option value="moda">{{ __('Moda') }}</option>
                                    <option value="cultura">{{ __('Cultura') }}</option>
                                    <option value="entretenimiento">{{ __('Entretenimiento') }}</option>
                                    <option value="ciencia">{{ __('Ciencia') }}</option>
                                    <option value="motor">{{ __('Motor') }}</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Apply Filter</button>
                            </div>
                        </form>
                        
                        @if (Auth::check())
                            <a href="{{ route('ads.show-my-ads') }}" class="btn btn-secondary mb-3">View My Ads</a>
                        @endif

                        <div class="card-body" style="text-align: center;">
                            <!-- Resto del contenido de la tarjeta -->
                            <div class="row">
                                @foreach ($ads as $ad)
                                    <div class="col-md-6 mb-4">
                                        <div class="card ad-card">
                                            <div class="card-body">
                                                <h4 class="ad-title" style="color:#080808">{{ $ad->title }}</h4>
                                                <p class="ad-subtitle" style="color:#101ee6;">{{ $ad->subtitle }}</p>
                                                
                                                <!-- Mostrar la imagen si no hay video -->
                                                @if (!$ad->video_url && $ad->image)
                                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                                @endif

                                                <!-- Mostrar el video si hay una URL de video -->
                                                @if ($ad->video_url)
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                       
                                                        <div class="responsive-video">
                                                            {!! $ad->video_url !!}
                                                        </div>
                                                    </div>
                                                @endif

                                                <!-- Resto del contenido del anuncio -->

                                                <p class="ad-content" style="color:#080808;">{{ Str::limit($ad->content, 30) }} <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="text-primary">Read more</a></p>
                                                <a href="{{ route('ads.index', ['category' => $ad->category]) }}" class="ad-category text-muted">
                                                    <strong>Category:</strong> {{ ucfirst($ad->category) }}
                                                </a>
                                                
                                                @if (Auth::check() && Auth::user()->id === $ad->user_id)
                                                    <a href="{{ route('ads.edit', ['id' => $ad->id]) }}" class="btn btn-primary">Edit Ad</a>
                                                @endif
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    @auth
                                                        
                                                  
                                                    <form class="like-form" action="{{ route('ads.like', ['id' => $ad->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link like-button"><i class="fas fa-thumbs-up text-primary"></i></button>
                                                    </form>
                                                    @endauth
                                                    <p class="ad-likes"><i class="fas fa-heart text-danger"></i> <span class="like-count">{{ $ad->likes_count }}</span></p>
                                                </div>
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
         
    <aside class="sidebar" style="margin-bottom: 2399px; margin-top: 2px;">
        <H1 style="margin-top: 10px; font-size: 18px; ">DESTACADAS</H1>
        <div class="latest-news">
            @foreach ($latestAds as $ad)
                <div class="news-item">
                    <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
                        <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}">
                        <p style="font-size: 10px;">{{ $ad->title }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        
    </aside>
        </div>
     
    </div>

    <style>
        .container-outer {
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
        }

        .container-inner {
            flex: 1;
            padding-right: 10px; /* Espacio entre el contenido principal y el aside */
        }

        .sidebar {
            width: 25%;
            background-color: rgba(245, 184, 229, 0.7);
            color: white;
            overflow: hidden; /* Evitar desbordamiento */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 10px;
            
        }

        .latest-news {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .news-item {
            position: relative;
            width: 180px;
            text-align: center;
            overflow: hidden; /* Evitar desbordamiento de título */
        }

        .news-item img {
            width: 100%;
            height: auto;
            object-fit: cover; /* Ajustar imagen al contenedor */
            transition: transform 0.3s;
        }

        .news-item:hover img {
            transform: scale(1.1); /* Zoom al hacer hover */
        }

        /* Estilos del título sobre la imagen */
        .news-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            font-weight: bold;
            font-size: 8px;
            text-align: center;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .news-item:hover p {
            transform: translateY(0);
        }
        @media (max-width: 767.98px) {
            .colored-box {
                padding: 10px; /* Reduce el espacio interno en tamaños móviles */
            }

            .container-inner {
                padding-right: 0; /* Elimina el espacio entre contenido principal y aside */
            }

            .sidebar {
                margin-top: 20px; /* Agrega espacio entre el contenedor principal y el aside */
                width: 100%; /* Ocupa todo el ancho en tamaños móviles */
            }

            .latest-news {
                flex-direction: row; /* Cambia la dirección en tamaños móviles */
                justify-content: space-between; /* Distribuye los elementos en el aside */
                align-items: center;
                gap: 10px; /* Espacio entre los elementos */
                overflow-x: auto; /* Agrega desplazamiento horizontal si los elementos desbordan */
                padding: 10px 0; /* Ajusta el espacio interno */
            }

            .news-item {
                width: 100px; /* Ancho más pequeño para los elementos en el aside */
                height: auto;
                text-align: center;
                overflow: hidden;
            }

            .news-item img {
                width: 100%;
                height: auto; /* Ajusta la altura automáticamente */
                object-fit: cover;
                transition: transform 0.3s;
            }

            .news-item:hover img {
                transform: scale(1.1);
            }

            .news-item p {
                position: relative;
                bottom: 0;
                left: 0;
                width: 100%;
                margin: 0;
                padding: 5px;
                background-color: rgba(0, 0, 0, 0.7);
                font-weight: bold;
                text-align: center;
                transform: translateY(100%);
                transition: transform 0.3s;
                font-size: 10px; /* Tamaño de fuente más pequeño */
            }

            .news-item:hover p {
                transform: translateY(0);
            }

           
        .latest-news p{
            flex-direction: row; /* Cambia la dirección en tamaños móviles */
                justify-content: space-between; /* Distribuye los elementos en el aside */
                align-items: center;
                gap: 0px; /* Espacio entre los elementos */
                overflow-x: auto; /* Agrega desplazamiento horizontal si los elementos desbordan */
                padding: 10px 0; /* Ajusta el espacio interno */
                "margin-bottom: -10px;
        }

        .asideimg {
            height: 150px;
            width: 150px;
        }
    
    }
        
        .ad-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background: linear-gradient(45deg, #f39c12, #deebb5);
            color: white;
        }

        .ad-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, white, #9b59b6);
            color: #ffffff;
        }

        .colored-box {
            background-color: #9b59b6;
            border-radius: 15px;
            box-sizing: border-box;
            padding: 20px; /* Agrega un poco de espacio interno a la caja */
        }

        .card {
            margin: 0;
            padding: 0; /* Elimina el padding de la card */
        }

        .card-body {
            padding: 10px; /* Ajusta el padding interno de la card-body */
        }

                        .responsive-video {
            position: relative;
            padding-top: 56.25%; /* Proporción 16:9 */
            overflow: hidden;
        }

        .responsive-video iframe,
        .responsive-video object,
        .responsive-video embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
                                                            
                                                            .ad-image {
                                                                width: 100%;
                                                                height: auto;
                                                            }
                                                            .animation-scroll ul {
        animation: scrollAnimation 30s linear infinite; /* Ajusta la velocidad (30s) según lo necesario */
        white-space: nowrap; /* Evita el ajuste de línea */
        overflow: hidden; /* Oculta el desbordamiento */
        margin: 0; /* Elimina el margen de la lista */
        padding: 0; /* Elimina el relleno de la lista */
        list-style: none; /* Elimina los marcadores de lista */
    }

    .animation-scroll li {
        display: inline-block;
        margin-right: 20px; /* Espacio entre elementos */
    }

    @keyframes scrollAnimation {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    </style>
</x-layout>
