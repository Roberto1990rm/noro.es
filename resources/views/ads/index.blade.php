<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Professional News') }}</div>

                    <div class="card-body text-center"> <!-- Agrega la clase text-center aquí -->
                        <form action="{{ route('ads.index') }}" method="GET" class="mb-3">
                            <label for="category">Filter by Category:</label>
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
                                <!-- Agrega más opciones según tus categorías -->
                            </select>
                            <button type="submit" class="btn btn-primary mt-1">Apply Filter</button>
                        </form>

                        <div class="row row-cols-2">
                            @foreach ($ads as $ad)
                                <div class="col-md-6 mb-3">
                                    <div class="card ad-card">
                                        <div class="card-body">
                                            <h4 class="ad-title">{{ $ad->title }}</h4>
                                            @if ($ad->image)
                                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image" style="height: 150px;">
                                            @endif
                                            <p class="ad-content">{{ $ad->content }}</p>
                                            <p>Category: {{ ucfirst($ad->category) }}</p>
                                            <p>Published at: {{ $ad->published_at }}</p>
                                            <a href="{{ route('ads.show', ['id' => $ad->id]) }}" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($ads->isEmpty())
                            <p>No ads available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
