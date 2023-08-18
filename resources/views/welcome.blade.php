<x-layout>
    <div class="mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h2>Welcome, {{ Auth::user()->name }}!</h2>
                            <p>{{ __('You are logged in!') }}</p>

                            <div class="mt-4">
                                <h4>Your Dashboard Content</h4>
                                <p>This is where you can manage your profile and ads.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h1>Últimas publicaciones</h1>
            <div class="row row-cols-1 row-cols-md-2">
                
                @foreach ($latestAds as $ad)
                    <div class="col mb-3">
                        <div class="card ad-card">
                            <div class="card-body">
                                <h4 class="ad-title">{{ $ad->title }}</h4>
                                @if ($ad->image)
                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image">
                                @endif
                                <p class="ad-content">{{ $ad->content }}</p>
                                <p>Category: {{ ucfirst($ad->category) }}</p>
                                <p>Published at: {{ $ad->published_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($latestAds->isEmpty())
                <p>No latest ads available.</p>
            @endif
        </div>
    </div>
</x-layout>
