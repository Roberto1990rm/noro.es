<x-layout>
    <style>
        .ad-card {
            border: 1px solid #ccc;
            padding: 20px;
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
    border-radius: 15px; /* Controla el radio de las esquinas redondeadas */
    
    box-sizing: border-box;
  }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pb-5 colored-box" >
                <h1 class="mb-4">
                    @if ($selectedCategory)
                        {{ __('Latest News in') }} {{ ucfirst($selectedCategory) }} {{ __('Category') }}
                    @else
                        {{ __('Latest News') }}
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

                        <div class="card-body">
                            <!-- Resto del contenido de la tarjeta -->
                            <div class="row">
                                @foreach ($ads as $ad)
                                    <div class="col-md-6 mb-4">
                                        <div class="card ad-card">
                                            <div class="card-body">
                                                <h4 class="ad-title">{{ $ad->title }}</h4>
                                                <p class="ad-subtitle">{{ $ad->subtitle }}</p>
                                                
                                                <!-- Mostrar la imagen si no hay video -->
                                                @if (!$ad->video_url && $ad->image)
                                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 200px; width: 100%;">
                                                @endif

                                                <!-- Mostrar el video si hay una URL de video -->
                                                @if ($ad->video_url)
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <style>
                                                            .embed-responsive {
                                                                position: relative;
                                                                display: block;
                                                                width: 100%;
                                                                padding: 0;
                                                                overflow: hidden;
                                                            }
                                                            
                                                            .embed-responsive::before {
                                                                content: "";
                                                                display: block;
                                                                padding-top: 56.25%;
                                                            }
                                                            
                                                            .embed-responsive .responsive-video {
                                                                position: absolute;
                                                                top: 0;
                                                                left: 0;
                                                                width: 100%;
                                                                height: 100%;
                                                                display: flex;
                                                                justify-content: center;
                                                                align-items: center;
                                                            }
                                                            
                                                            .ad-image {
                                                                width: 100%;
                                                                height: auto;
                                                            }
                                                        </style>
                                                        <div class="responsive-video">
                                                            {!! $ad->video_url !!}
                                                        </div>
                                                    </div>
                                                @endif

                                                <!-- Resto del contenido del anuncio -->

                                                <p class="ad-content">{{ Str::limit($ad->content, 30) }} <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="text-primary">Read more</a></p>
                                                <p class="ad-category text-muted"><strong>Category:</strong> {{ ucfirst($ad->category) }}</p>

                                                @if (Auth::check() && Auth::user()->id === $ad->user_id)
                                                    <a href="{{ route('ads.edit', ['id' => $ad->id]) }}" class="btn btn-primary">Edit Ad</a>
                                                @endif
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <form class="like-form" action="{{ route('ads.like', ['id' => $ad->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link like-button"><i class="fas fa-thumbs-up text-primary"></i></button>
                                                    </form>
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
    </div>
</x-layout>
