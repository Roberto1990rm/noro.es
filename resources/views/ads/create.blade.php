<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Professional News') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="subtitle">{{ __('Subtitle') }}</label>
                                <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}">
                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">{{ __('Category') }}</label>
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
                                
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="video_url">{{ __('YouTube Video iFrame') }}</label>
                                <textarea id="video_url" class="form-control @error('video_url') is-invalid @enderror" name="video_url" rows="4">{{ old('video_url') }}</textarea>
                                @error('video_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="related_images">{{ __('Related Images') }}</label>
                                <div class="related-images-container">
                                    <input type="file" class="form-control mt-2" name="related_images[]">
                                </div>
                                <button type="button" class="btn btn-secondary mt-2" id="add-related-image">{{ __('Add Another Image') }}</button>
                            </div>
                            
                            <div class="form-group">
                                @auth
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create News') }}
                                    </button>
                                @endauth
                                @guest
                                    <h1>{{ __('You must be registered to publish') }}</h1>
                                @endguest
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
