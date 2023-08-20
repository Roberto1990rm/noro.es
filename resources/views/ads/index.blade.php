<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Professional News') }}</div>

                    <div class="card-body">
                        <!-- Resto del formulario y contenido -->

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
                                                            padding-top: 56.25%; /* 16:9 aspect ratio */
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
                                                        {!! $ad->video_url !!} <!-- Pega aquí el código de inserción que copiaste -->
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
                                                <form action="{{ route('ads.like', ['id' => $ad->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-link"><i class="fas fa-thumbs-up text-primary"></i></button>
                                                </form>
                                                <p class="ad-likes"><i class="fas fa-heart text-danger"></i> {{ $ad->likes_count }}</p>
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
</x-layout>
