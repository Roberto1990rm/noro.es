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
                            <h4>Comments</h4>
                            @if ($ad->comments->isEmpty())
                                <p>No comments yet.</p>
                            @else
                                <ul class="list-unstyled">
                                    @foreach ($ad->comments->chunk(15) as $commentsChunk)
                                        @foreach ($commentsChunk as $index => $comment)
                                            <li style="background-color: {{ $index % 2 === 0 ? '#f7f7f7' : '#ffffff' }}">
                                                <div>
                                                    <p>{{ Str::limit($comment->content, 300) }}</p>
                                                    <p class="text-muted">Posted by: {{ $comment->user->name }} on {{ $comment->created_at }}</p>
                                                   
                                                   @auth
                                                    @if (Auth::user()->is_revisor || Auth::user()->id === $comment->user_id)
                                                        <form action="{{ route('ads.comments.destroy', ['ad_id' => $ad->id, 'comment_id' => $comment->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @endif
                                                    @endauth
                                                </div>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        @if (Auth::check())
                            <form action="{{ route('ads.comments.store', ['id' => $ad->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="content">Add a Comment:</label>
                                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Comment</button>
                            </form>
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
