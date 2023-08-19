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
                
            </div>

            <!-- Agrega más campos de edición aquí -->

            <button type="submit" class="btn btn-primary">Update Ad</button>
        </form>
    </div>
</x-layout>

