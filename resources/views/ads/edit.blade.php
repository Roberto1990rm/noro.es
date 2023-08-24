<x-layout>
    <div class="container" style="color: white;">
        <h2>Edit Ad</h2>
        <form action="{{ route('ads.update', ['id' => $ad->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $ad->title }}">
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $ad->subtitle }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{ $ad->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <div class="form-group">
                        <div class="form-group">
                            <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
                                <option value="" disabled selected>{{ __('Select a category') }}</option>
                                @foreach (['españa', 'internacional', 'politica','agenda2030', 'LGTBIQ+',  'corrupcion', 'autoritarismo', 'inmigracion', 'europa'] as $categoryValue)
                                    <option value="{{ $categoryValue }}">{{ __($categoryValue) }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="video_url" class="form-label">Video URL</label>
                <input type="text" class="form-control" id="video_url" name="video_url" value="{{ $ad->video_url }}">
            </div>

            <div class="mb-3">
                <label for="hashtags" class="form-label">Hashtags</label>
                <input type="text" class="form-control" id="hashtags" name="hashtags" value="{{ implode(', ', $ad->hashtags->pluck('tag')->toArray()) }}">
                <small class="form-text text-muted">Enter hashtags separated by commas.</small>
            </div>
            

            <div class="mb-3">
                <label for="related_images" class="form-label">Related Images</label>
                <input type="file" class="form-control" id="related_images" name="related_images[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Update Ad</button>
        </form>
    </div>
</x-layout>