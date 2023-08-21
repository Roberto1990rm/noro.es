<x-layout>
    <div class="scroll-navbar animation-scroll" style="margin-top: -60px; color: pink; background-color: purple;">
        <ul>
            @foreach ($latestAds as $index => $ad)
                <li class="{{ $index === 0 ? 'first-item' : '' }}">
                    @php
                        $colors = ['#FF5733', '#33FF57', '#FFFFFF', '#FF33C7']; // Colores claros diferentes
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
            <div class="col-md-8 pb-5 colored-box" style="margin-right: 30px; margin-left:10px;">
                <h1 class="mb-4">
                    @if ($selectedCategory)
                        {{ __('Lo último:') }} {{ ucfirst($selectedCategory) }} 
                    @else
                        {{ __('Novedades') }}
                    @endif
                </h1>
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Publicaciones') }}</div>
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
                                                <a href="{{ route('ads.index', ['category' => $ad->category]) }}" class="ad-category text-muted">
                                                    <strong>Category:</strong> {{ ucfirst($ad->category) }}
                                                </a>
                                                
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
        </div>
        <aside class="sidebar" style=" margin-top: 0px; background-color:#f39c12; border-radius: 10px; margin-right:10px;">
            <H1 style="margin-top: 10px; font-size: 18px;">DESTACADO</H1>
            <div class="latest-news">
                @foreach ($latestAds as $ad)
                <div class="news-item">
                    <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
                        <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" style="width: 100%; height: auto;">
                        <p style="font-size: 10px; color: white; ">{{ $ad->title }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </aside>
    </div>





</x-layout>
    
        <style>
           .container-outer {
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
        }

        .container-inner {
        flex: 1;
        max-width: 100%; /* Ajusta el ancho máximo del contenido principal */
        padding-left: 10%;
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
            padding: 3px; /* Agrega un poco de espacio interno a la caja */
        }

        .card {
            margin: 0;
            padding: 0; /* Elimina el padding de la card */
        }

        .card-body {
            padding: 0px; /* Ajusta el padding interno de la card-body */
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

   
    .sidebar {
        flex-direction: column;
        width: 36%;
        height: 100%;
        margin-top: 0px;
        margin-left: -30px;
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
    overflow: hidden;
}

.news-item img {
    width: 100%;
    height: auto;
    object-fit: cover;
    transition: transform 0.3s;
}

.news-item:hover img {
    transform: scale(1.1);
}

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
    transform: translateY(0); /* Cambiar a 0 para que el título siempre sea visible */
    transition: transform 0.3s;
}

.news-item:hover p {
    transform: translateY(100%); /* Cambiar a 100% para ocultar el título en hover */
}

/* Agrega estilos al título en hover */
.news-item:hover p {
    transform: translateY(100%); /* Oculta el título en hover */
}

.news-item:hover p:before {
    content: "";
    display: block;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: -1;
}
@media (max-width: 500px) {
    .container-outer {
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            width: 100%;
        }
        
    .container-inner {
        margin-right: 10px; 
        padding-left: 0px;/* Reducir margen derecho entre el div de los anuncios y el aside */
    }
    
    .sidebar {
        margin-left: -30px; /* Reducir margen izquierdo del aside */
    }
}
@media (min-width: 800px) {
    .container-inner {
        margin-right: -100px; 
        margin-left: -90px;/* Reducir margen derecho entre el div de los anuncios y el aside */
    }
    
    .sidebar {
        margin-left: -100px; /* Reducir margen izquierdo del aside */
    }

    .sidebar {
        margin-right: 10px; /* Reducir margen izquierdo del aside */
    }
}



    
  
    
       
       
       
       
       
      
