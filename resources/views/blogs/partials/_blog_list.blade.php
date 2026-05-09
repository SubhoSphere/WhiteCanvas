@foreach($posts as $post)
<article class="blog-list-item">
    <a href="{{ route('blogs.show', $post->slug) }}" style="display: contents; color: inherit; text-decoration: none;">
        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="item-img">
        <div class="card-content">
            <span class="card-category">{{ $post->category }}</span>
            <h3 class="card-title">{{ $post->title }}</h3>
            <p class="card-desc">{{ $post->short_description ?? Str::limit(strip_tags($post->content), 120) }}</p>
            <div class="card-footer">
                <img src="https://i.pravatar.cc/150?u={{ $post->author->username }}" alt="{{ $post->author->name }}" class="author-avatar">
                <div class="author-info">
                    <span class="author-name">{{ $post->author->name }}</span>
                    <span class="post-date">{{ $post->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </a>
</article>
@endforeach

@if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
<div class="pagination-wrapper">
    {{ $posts->links() }}
</div>
@endif
