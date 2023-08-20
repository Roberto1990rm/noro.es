<x-layout>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(45deg, #ffffff, #f0f0f0);
        }

        .ad-card {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #e74c3c;
        }

        .ad-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background-color: #3498db;
        }
    </style>

    <div class="mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h2 class="mb-4">Welcome, {{ Auth::user()->name }}!</h2>
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
            <h1 class="text-center">Últimas publicaciones</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
                
                @foreach ($latestAds as $ad)
                    <div class="col mb-3">
                        <div class="card ad-card">
                            <div class="card-body text-center">
                                <h4 class="ad-title">{{ $ad->title }}</h4>
                                <h5 class="ad-subtitle">{{ $ad->subtitle }}</h5>
                                @if ($ad->image)
                                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid ad-image" style="max-height: 200px;">
                                @endif
                                <p class="ad-content">{{ substr($ad->content, 0, 100) }} ... <a href="{{ route('ads.show', ['id' => $ad->id]) }}">Ver más</a></p>
                                <p>Category: <a href="{{ route('ads.index', ['category' => $ad->category]) }}">{{ ucfirst($ad->category) }}</a></p>
                                <p>Created at: {{ $ad->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($latestAds->isEmpty())
                <p class="text-center">No latest ads available.</p>
            @endif
        </div>
    </div>
</x-layout>
