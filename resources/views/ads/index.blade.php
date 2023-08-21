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
    <div class="category-buttons d-none d-md-flex">
        <button class="btn btn-category" style="background-color: #FF5733;"><a href="{{ route('ads.index', ['category' => 'espana']) }}" class="category-link" style="background-color: #FF5733; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">España</a></button>
        <button class="btn btn-category" style="background-color: #33FF57;"><a href="{{ route('ads.index', ['category' => 'inmigracion']) }}" class="category-link" style="background-color: #33FF57; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Fronteras abiertas</a></button>
        <button class="btn btn-category" style="background-color: #FF33C7;"><a href="{{ route('ads.index', ['category' => 'europa']) }}" class="category-link" style="background-color: #FF33C7; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Europa</a></button>
        <button class="btn btn-category" style="background-color: #9b59b6;"><a href="{{ route('ads.index', ['category' => 'internacional']) }}" class="category-link" style="background-color: #9b59b6; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Mundo</a></button>
        <button class="btn btn-category" style="background-color: blue;"><a href="{{ route('ads.index', ['category' => 'politica']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Política</a></button>
        <button class="btn btn-category" style="background-color: rgb(26, 255, 0);"><a href="{{ route('ads.index', ['category' => 'covid']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Covid 2.0</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 98, 0);"><a href="{{ route('ads.index', ['category' => 'agenda2030']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Agenda2030</a></button>
        <button class="btn btn-category" style="background-color:rgb(74, 149, 156);;"><a href="{{ route('ads.index', ['category' => 'lgtbiq+']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">LGTBIQ+</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 0, 208);"><a href="{{ route('ads.index', ['category' => 'ideologia']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Ideología de género</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 0, 47);"><a href="{{ route('ads.index', ['category' => 'corrupcion']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Corrupción</a></button>
        <button class="btn btn-category" style="background-color: rgb(205, 199, 32);"><a href="{{ route('ads.index', ['category' => 'autoritarismo']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Autoritarismo</a></button>
        <button class="btn btn-category" style="background-color: blue;"><a href="{{ route('ads.index', ['category' => 'alarmismo']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Alarmismo climática</a></button>
    </div>
    
    
    <div class="category-buttons d-flex d-md-none overflow-auto">
        <button class="btn btn-category" style="background-color: #FF5733;"><a href="{{ route('ads.index', ['category' => 'espana']) }}" class="category-link" style="background-color: #FF5733; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">España</a></button>
        <button class="btn btn-category" style="background-color: #33FF57;"><a href="{{ route('ads.index', ['category' => 'inmigracion']) }}" class="category-link" style="background-color: #33FF57; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Fronteras abiertas</a></button>
        <button class="btn btn-category" style="background-color: #FF33C7;"><a href="{{ route('ads.index', ['category' => 'europa']) }}" class="category-link" style="background-color: #FF33C7; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Europa</a></button>
        <button class="btn btn-category" style="background-color: #9b59b6;"><a href="{{ route('ads.index', ['category' => 'internacional']) }}" class="category-link" style="background-color: #9b59b6; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Mundo</a></button>
        <button class="btn btn-category" style="background-color: blue;"><a href="{{ route('ads.index', ['category' => 'politica']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Política</a></button>
        <button class="btn btn-category" style="background-color: rgb(26, 255, 0);"><a href="{{ route('ads.index', ['category' => 'covid']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Covid 2.0</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 98, 0);"><a href="{{ route('ads.index', ['category' => 'agenda2030']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Agenda2030</a></button>
        <button class="btn btn-category" style="background-color:rgb(74, 149, 156);;"><a href="{{ route('ads.index', ['category' => 'lgtbiq+']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">LGTBIQ+</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 0, 208);"><a href="{{ route('ads.index', ['category' => 'ideologia']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Ideología de género</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 0, 47);"><a href="{{ route('ads.index', ['category' => 'corrupcion']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Corrupción</a></button>
        <button class="btn btn-category" style="background-color: rgb(205, 199, 32);"><a href="{{ route('ads.index', ['category' => 'autoritarismo']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Autoritarismo</a></button>
        <button class="btn btn-category" style="background-color: blue;"><a href="{{ route('ads.index', ['category' => 'alarmismo']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Alarmismo climática</a></button>
    </div>
    
    <div class="container-outer">
        <div class="container-inner me-0">
            <div class="col-md-8 pb-5 colored-box" style="margin-right: 30px; margin-left:10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                <h1 class="mb-4">
                    @if ($selectedCategory)
                        {{ __('Lo último:') }} {{ ucfirst($selectedCategory) }} 
                    @else
                        {{ __('Novedades') }}
                    @endif
                </h1>
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Publicaciones') }}</div>
                    <div class="card-body bgcolor" style="padding: 10px;">
                        <form action="{{ route('ads.index') }}" method="GET" class="mb-3">
                            <label style="color:white;" for="category" class="form-label">Filtrar por Categoría:</label>
                            <div class="input-group">
                                <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
                                    <option value="" disabled selected>{{ __('Select a category') }}</option>
                                    <option value="espana">{{ __('España') }}</option>
                                    <option value="inmigracion">{{ __('Fronteras abriertas') }}</option>
                                    <option value="europa">{{ __('Europa') }}</option>
                                    <option value="internacional">{{ __('Mundo') }}</option>
                                    <option value="politica">{{ __('Política') }}</option>
                                    <option value="covid">{{ __('Covid 2.0') }}</option>
                                    <option value="agenda2030">{{ __('Agenda2030') }}</option>
                                    <option value="lgtbiq+">{{ __('Lgtbiq+') }}</option>
                                    <option value="ideologia">{{ __('Ideología de Género') }}</option>
                                    <option value="corrupcion">{{ __('Corrupción') }}</option>
                                    <option value="autoritarismo">{{ __('Autoritarismo') }}</option>
                                    <option value="alarmismo">{{ __('Alarmismo Climático') }}</option>
                                </select>
                                
                                <button type="submit" class="btn btn-primary">Apply Filter</button>
                            </div>
                        </form>
                        
                        @if (Auth::check())
                            <a href="{{ route('ads.show-my-ads') }}" class="btn btn-secondary mb-3">View My Ads</a>
                        @endif

                        <div class="card-body" style="text-align: center; ">
                            <!-- Resto del contenido de la tarjeta -->
                            <div class="row bgcolor" style="padding-top: 10px;"  >
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
                                                            <button class="btn btn-link like-button" data-ad-id="{{ $ad->id }}">
                                                                <i class="fas fa-thumbs-up text-primary"></i>
                                                            </button>
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
        <aside class="sidebar" style=" margin-top: 0px; background-color:#aba2f7; border-radius: 10px; margin-right:10px;">
            <div style="background-color: #1900ff">
            <H1 style=" margin-top: 10px; font-size: 18px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">DESTACADO</H1>
        </div>
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
            <div style="background-color:  #ff004c">
            <H1 style="margin-top: 10px; font-size: 18px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">videos</H1>
            </div>
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
            <div style="background-color:  #04ff00">
            <H1 style="margin-top: 10px; font-size: 18px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">ANUNCIANTES</H1>
            </div>
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
            background: linear-gradient(45deg, #ffedf3, #fac3f4);
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
        animation: scrollAnimation 15s linear infinite; /* Ajusta la velocidad (30s) según lo necesario */
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
@media (max-width: 600px) {
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
        margin-left: -100px;/* Reducir margen derecho entre el div de los anuncios y el aside */
    }
    
    .sidebar {
        margin-left: -100px; /* Reducir margen izquierdo del aside */
    }

    .sidebar {
        margin-right: 100px; /* Reducir margen izquierdo del aside */
    }
}

.category-buttons {
    margin-top: -18px;
    display: flex;
    justify-content: space-between;
    width: 100%;
    max-width: 100%;
    overflow-x: auto;
    padding: 15px 0;
}

.btn-category {
    flex: 1;
    padding: 10px 0;
    border: none;
    color: white;
    font-size: 14px;
    cursor: pointer;
    outline: none;
    transition: background-color 0.3s;
}

.btn-category:hover {
    opacity: 0.8;
}

@media (max-width: 500px) {
    .btn-category {
        flex-basis: calc(50% - 10px);
    }

    .btnnone{
        display: none;
    }
}


</style>

    
  
    
       
       
       
       
       
      
