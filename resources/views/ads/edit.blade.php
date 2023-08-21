<!-- resources/views/ads/edit.blade.php -->
<x-layout>
    <div class="container">
        <h2>Edit Ad</h2>
        <form action="{{ route('ads.update', ['id' => $ad->id]) }}" method="post">
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
                <div class="form-group">
                    <label for="category">{{ __('Category') }}</label>
                    <div class="form-group">
                        <label for="category">{{ __('Select a category') }}</label>
                        <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
                            <option value="" disabled selected>{{ __('Select a category') }}</option>
                            @foreach (['espana', 'internacional', 'politica', 'covid', 'agenda2030', 'lgtbiq+', 'ideologia', 'corrupcion', 'autoritarismo', 'alarmismo', 'inmigracion', 'europa'] as $categoryValue)
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

            <!-- Agrega más campos de edición aquí -->

            <button type="submit" class="btn btn-primary">Update Ad</button>
        </form>
    </div>
</x-layout>

