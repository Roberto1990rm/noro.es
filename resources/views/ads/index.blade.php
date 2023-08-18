<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Professional News') }}</div>

                    <div class="card-body">
                        <div class="row row-cols-2">
                            @foreach ($ads as $ad)
                                <div class="col-md-6 mb-3">
                                    <div class="card ad-card">
                                        <div class="card-body">
                                            <h4 class="ad-title">{{ $ad->title }}</h4>
                                            @if ($ad->image)
                                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image"  >
                                            @endif
                                            <p class="ad-content">{{ $ad->content }}</p>
                                            <p>Category: {{ ucfirst($ad->category) }}</p>
                                            <p>Published at: {{ $ad->published_at }}</p>
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
