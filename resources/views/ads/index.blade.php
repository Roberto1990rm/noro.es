<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Professional News') }}</div>

                    <div class="card-body">
                        <form action="{{ route('ads.index') }}" method="GET" class="mb-3">
                            <label for="category" class="form-label">Filter by Category:</label>
                            <div class="input-group">
                                <select name="category" id="category" class="form-select">
                                    <option value="">All</option>
                                    <option value="nacional">Nacional</option>
                                    <option value="internacional">Internacional</option>
                                    <option value="politica">Politica</option>
                                    <option value="economia">Economia</option>
                                    <option value="tecnologia">Tecnologia</option>
                                    <option value="moda">Moda</option>
                                    <option value="cultura">Cultura</option>
                                    <option value="entretenimiento">Entretenimiento</option>
                                    <option value="ciencia">Ciencia</option>
                                    <option value="motor">Motor</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Apply Filter</button>
                            </div>
                        </form>
                        
                        @if (Auth::check())
                            <a href="{{ route('ads.show-my-ads') }}" class="btn btn-secondary mb-3">View My Ads</a>
                        @endif

                        <div class="row row-cols-2">
                            @foreach ($ads as $ad)
                                <div class="col-md-6 mb-4">
                                    <div class="card ad-card">
                                        <div class="card-body">
                                            <h4 class="ad-title">{{ $ad->title }}</h4>
                                            <p class="ad-subtitle">{{ $ad->subtitle }}</p>
                                            @if ($ad->image)
                                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image" style="max-height: 150px;">
                                            @endif
                                            <p class="ad-content">{{ Str::limit($ad->content, 100) }} <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="text-primary">Read more</a></p>
                                            <p class="ad-category text-muted"><strong>Category:</strong> {{ ucfirst($ad->category) }}</p>
                                            <p class="ad-created text-muted"><strong>Published at:</strong> {{ $ad->created_at }}</p>
                                            @if ($ad->user)
                                                <p class="ad-user text-muted"><strong>Created by:</strong> {{ $ad->user->name }}</p>
                                            @endif
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
