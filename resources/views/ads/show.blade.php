<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ad Details') }}</div>

                    <div class="card-body">
                        <h2>{{ $ad->title }}</h2>
                        @if ($ad->image)
                            <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image" style="max-height: 300px;">
                        @endif
                        <p class="ad-subtitle">{{ $ad->subtitle }}</p>
                        <p class="ad-category">Category: {{ ucfirst($ad->category) }}</p>
                        <p class="ad-content">{{ $ad->content }}</p>
                        <p>Published at: {{ $ad->created_at }}</p>
                        @if ($ad->user)
                            <p>Created by: {{ $ad->user->name }}</p>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('ads.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
