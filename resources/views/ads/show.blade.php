<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2>{{ $ad->title }}</h2>
                @if ($ad->image)
                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid">
                @endif
                <p>{{ $ad->content }}</p>
                <p>Category: {{ ucfirst($ad->category) }}</p>
                <p>Published at: {{ $ad->published_at }}</p>
            </div>
        </div>
    </div>
</x-layout>
