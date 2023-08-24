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
        <button class="btn btn-category" style="background-color: #33FF57;"><a href="{{ route('ads.index', ['category' => 'inmigracion']) }}" class="category-link" style="background-color: #33FF57; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Inmigración</a></button>
        <button class="btn btn-category" style="background-color: #FF33C7;"><a href="{{ route('ads.index', ['category' => 'europa']) }}" class="category-link" style="background-color: #FF33C7; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Europa</a></button>
        <button class="btn btn-category" style="background-color: #9b59b6;"><a href="{{ route('ads.index', ['category' => 'internacional']) }}" class="category-link" style="background-color: #9b59b6; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Internacional</a></button>
        <button class="btn btn-category" style="background-color: blue;"><a href="{{ route('ads.index', ['category' => 'politica']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Política</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 98, 0);"><a href="{{ route('ads.index', ['category' => 'agenda2030']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Agenda2030</a></button>
        <button class="btn btn-category" style="background-color:rgb(74, 149, 156);;"><a href="{{ route('ads.index', ['category' => 'lgtbiq+']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">LGTBIQ+</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 0, 47);"><a href="{{ route('ads.index', ['category' => 'corrupcion']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Corrupción</a></button>
        <button class="btn btn-category" style="background-color: rgb(205, 199, 32);"><a href="{{ route('ads.index', ['category' => 'autoritarismo']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Totalitarismo</a></button>
    </div>
    
    
    <div class="category-buttons d-flex d-md-none overflow-auto">
        <button class="btn btn-category" style="background-color: #FF5733;"><a href="{{ route('ads.index', ['category' => 'espana']) }}" class="category-link" style="background-color: #FF5733; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">España</a></button>
        <button class="btn btn-category" style="background-color: #33FF57;"><a href="{{ route('ads.index', ['category' => 'inmigracion']) }}" class="category-link" style="background-color: #33FF57; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Inmigración</a></button>
        <button class="btn btn-category" style="background-color: #FF33C7;"><a href="{{ route('ads.index', ['category' => 'europa']) }}" class="category-link" style="background-color: #FF33C7; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Europa</a></button>
        <button class="btn btn-category" style="background-color: #9b59b6;"><a href="{{ route('ads.index', ['category' => 'internacional']) }}" class="category-link" style="background-color: #9b59b6; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Internacional</a></button>
        <button class="btn btn-category" style="background-color: blue;"><a href="{{ route('ads.index', ['category' => 'politica']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Política</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 98, 0);"><a href="{{ route('ads.index', ['category' => 'agenda2030']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Agenda2030</a></button>
        <button class="btn btn-category" style="background-color:rgb(74, 149, 156);;"><a href="{{ route('ads.index', ['category' => 'lgtbiq+']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">LGTBIQ+</a></button>
        <button class="btn btn-category" style="background-color: rgb(255, 0, 47);"><a href="{{ route('ads.index', ['category' => 'corrupcion']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Corrupción</a></button>
        <button class="btn btn-category" style="background-color: rgb(205, 199, 32);"><a href="{{ route('ads.index', ['category' => 'autoritarismo']) }}" class="category-link" style="background-color: #your-color; text-decoration: none; color: white; padding: 1px; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);">Totalitarismos</a></button>
    </div>
    
    <div class="container-outer" >
        
        <div class="container-inner">
            <div class="row">
                <div class="col-md-12 pb-5 colored-box">
                
                    
                <h1 class="mb-4">
                    @if ($selectedCategory)
                        {{ __('Lo último:') }} {{ ucfirst($selectedCategory) }} 
                    @else
                        {{ __('Publicado') }}
                    @endif
                </h1>
                <div class="search-form" style="display: flex; justify-content: center; margin-bottom: 5px;">
                    <form action="{{ route('ads.index') }}" method="GET">
                        <input type="text" name="search" placeholder="Buscar publicación..">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
                <div class="card ad-container">
                    <!-- ... Resto del contenido ... -->
                    <div class="card-body bgcolor" style="padding: 0px;">
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
                                            
                                            <div id="carousel-{{ $ad->id }}-{{ $index }}" class="carousel slide mb-3" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                @if ($ad->video_url)
                                                    <div class="carousel-item active">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <div class="responsive-video" >
                                                                {!! $ad->video_url !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            
                                                @if (!$ad->video_url && $ad->image)
                                                <div class="carousel-item active" style="display: flex; justify-content: center; align-items: center;"> <!-- Cambia "active" a "carousel-item" -->
                                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->image }}" class="img-fluid ad-image mb-3" style="max-height: 500px; width: 100%;">
                                                </div>
                                            @endif
                                                @foreach ($ad->relatedImages as $relatedImage)
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <<img src="{{ asset('storage/' . $relatedImage->image_path) }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 500px; width: 100%;">
                                                    </div>
                                                </div>
                                                @endforeach
                                                @if (count($ad->relatedImages) > 1) <!-- Verifica si hay más de una imagen -->
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $ad->id }}-{{ $index }}" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $ad->id }}-{{ $index }}" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            @endif
</div>
    
   
</div>

    
    
                                            <p class="ad-content" style="color:#080808;">{{ Str::limit($ad->content, 30) }} <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="text-primary">Read more</a></p>
                                           
                                            @if (Auth::check() && Auth::user()->id === $ad->user_id)
                                                <a href="{{ route('ads.edit', ['id' => $ad->id]) }}" class="btn btn-primary">Edit Ad</a>
                                            @endif

<div class="mb-3">
    <label for="hashtags" class="form-label">Hashtags</label>
    @foreach ($ad->hashtags as $hashtag)
        <a href="{{ route('ads.index', ['hashtag' => $hashtag->tag, 'category' => request('category'), 'search' => request('search')]) }}" class="btn btn-link">#{{ $hashtag->tag }}</a> <!-- Agregado "#" delante de la variable del hashtag -->
    @endforeach


   
</div>
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


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center pagination-custom"> <!-- Agrega la clase "pagination-custom" -->
                {{ $ads->links() }} <!-- Mostrará los enlaces de paginación -->
            </ul>
        </nav>
        
    </div>





    <aside class="sidebar">
                <div class="latest-news">
                    <div style="background-color:  #ff00c3; width: 100%;" >
                        <H1 style="margin-top: 10px; font-size: 18px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Favoritos</H1>
                        </div>
                    @foreach ($latestAds as $ad)
                        <div class="news-item">
                            <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
                                <div id="carousel-{{ $ad->id }}" class="carousel slide" data-bs-ride="carousel">
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
                                
                                        @if ($ad->image)
                                            <div class="carousel-item {{ $ad->video_url ? '' : 'active' }}">
                                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                            </div>
                                        @endif
                                
                                        @foreach ($ad->relatedImages as $relatedImage)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $relatedImage->image_path) }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                            </div>
                                        @endforeach
                                    </div>
                                
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                
                                <p style="font-size: 10px; color: white; ">{{ $ad->title }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            <div style="background-color: #ff004c">
                <h1 style="margin-top: 10px; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">videos</h1>
            </div>
          <div class="latest-news">
    @foreach ($latestAds1 as $ad)
        @if (!empty($ad->video_url))
            <div class="news-item">
                <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
                    <div class="embed-responsive embed-responsive-16by9">
                        <div class="responsive-video">
                            {!! $ad->video_url !!} <!-- Utiliza la URL del video incrustado directamente -->
                        </div>
                    </div>
                    <p style="font-size: 10px; color: white;">{{ $ad->title }}</p>
                </a>
            </div>
        @endif
    @endforeach
</div>

            <div style="background-color:  #ff00fb">
            <H1 style="margin-top: 10px; font-size: 18px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Publicidad</H1>
            </div>
            <div class="latest-news">
                @foreach ($latestAds as $ad)
                <div class="news-item">
                    <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
                        <div id="carousel-{{ $ad->id }}" class="carousel slide mb-3" data-bs-ride="carousel">
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
                        
                                @if ($ad->image)
                                    <div class="carousel-item {{ $ad->video_url ? '' : 'active' }}">
                                        <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                    </div>
                                @endif
                        
                                @foreach ($ad->relatedImages as $relatedImage)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $relatedImage->image_path) }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                    </div>
                                @endforeach
                            </div>
                        
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $ad->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        
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
        justify-content: center;
        align-items: flex-start; /* Alinear el contenido arriba */
        margin-left: 10px;
    }

    .container-inner {
        flex: 1;
        max-width: 100%;
    }

    .colored-box {
        background-color: #9b59b6;
        border-radius: 15px;
        box-sizing: border-box;
        padding: 3px;
    }

    .card {
        margin: 0;
        padding: 0;
    }

    .card-body {
        padding: 0px;
    }

    .sidebar {
    display: flex;
    flex-direction: column;
    width: 32%;
    height: 100%;
    border-radius: 10px;
    margin-left: 10PX;
}



    .latest-news {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;
    }

    /* Estilos de los botones de categoría */
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



  

 

}


@media (min-width: 800px) {
  .sidebar{
    margin-left: -200px;
  }

  .container-outer{
    margin-left: 200px;
  }

}


    @media (max-width: 550px) {
        .btn-category {
            flex-basis: calc(50% - 10px);
        }

        .btnnone {
            display: none;
        }

        .sidebar{
           
            margin-left: 2%;
        }

        .container-outer{
            margin-left: 1px;
        }
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
.ad-container {
    background-color: #f2f2f2; 
    transition: background-color 0.3s; /* Agrega una transición suave */
}

.ad-container:hover {
    background-color: #e9b7f6; 
}

.ad-container::after {
    content: "";
    position: absolute;
    bottom: -10px; /* Ajusta el valor según el espaciado deseado */
    left: 0;
    width: 100%;
    height: 5px; /* Alto de la línea */
    background: linear-gradient(to right, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2)); /* Sombreado */
    border-radius: 10px 10px 0 0; /* Bordes redondeados */
    z-index: -1; /* Coloca el sombreado detrás del contenido */
    opacity: 0; /* Oculta el sombreado inicialmente */
    transition: opacity 0.3s;
}

.ad-container:hover::after {
    opacity: 1; /* Muestra el sombreado en el hover */
}


body{
    background: url('/images/colores.jpg') no-repeat center center fixed;
}

h2 {
    margin-top: 10px;
    margin-bottom: 20px;
    color: #ffffff;
    text-shadow: 0 0 4px rgb(8, 8, 8);
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
    height: 100%;
    border: 0; /* Remove border for the iframe */
}

</style>

    
  
    
       
       
       
       
       
      
