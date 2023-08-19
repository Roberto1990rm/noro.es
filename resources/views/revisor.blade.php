<x-layout>
    <div class="container">
        <h2>Revisor Panel - Ads</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ad)
                <tr>
                    <td>{{ $ad->title }}</td>
                    <td>{{ $ad->content }}</td>
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
</x-layout>
