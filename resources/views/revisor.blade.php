<x-layout>
    <div class="container">
        <h2>Revisor Panel - Ads</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $ad)
                    <tr>
                        <td>{{ $ad->title }}</td>
                        <td>{{ $ad->subtitle }}</td>
                        <td>{{ $ad->content }}</td>
                        <td>
                            @if ($ad->image)
                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" style="max-height: 100px; width: 40px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('revisor.update-visibility', ['id' => $ad->id]) }}" method="post">
                                @csrf
                                <select name="is_visible" class="form-select">
                                    <option value="0" {{ $ad->is_visible === 0 ? 'selected' : '' }}>Not Visible</option>
                                    <option value="1" {{ $ad->is_visible === 1 ? 'selected' : '' }}>Visible</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
