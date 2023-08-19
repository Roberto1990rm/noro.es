<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Ad Details') }}</div>

                    <div class="card-body">
                        <h2 class="mb-3">{{ $ad->title }}</h2>
                        @if ($ad->image)
                            <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image mb-3" style="max-height: 300px;">
                        @endif
                        <p class="ad-subtitle text-muted">{{ $ad->subtitle }}</p>
                        <p class="ad-category text-primary"><strong>Category:</strong> {{ ucfirst($ad->category) }}</p>
                        <div class="ad-content mb-4">{{ $ad->content }}</div>
                        <p class="text-muted"><strong>Published at:</strong> {{ $ad->created_at }}</p>
                        @if ($ad->user)
                            <p class="text-muted"><strong>Created by:</strong> {{ $ad->user->name }}</p>
                        @endif
                        @if (Auth::check())
                            <form action="{{ route('ads.like', ['id' => $ad->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-link text-primary"><i class="fas fa-thumbs-up"></i> Like</button>
                            </form>
                            <p class="d-inline-block ml-2"><i class="fas fa-heart text-danger"></i> Likes: {{ $ad->likes_count }}</p>
                        @endif
                        <div class="mt-4">
                            <a href="{{ route('ads.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
