@extends('layouts.app')

@section('title', 'Recent Blog Posts - WhiteCanvas')
@section('meta_description', 'Stay updated with the latest news on Admit Cards, Results, and Engineering trends on WhiteCanvas.')

@section('content')
<div class="container">
    @if($posts->count() > 0)
    @php $hero = $posts->first(); @endphp
    <!-- Hero Section -->
    <section class="hero">
        <a href="{{ route('blogs.show', $hero->slug) }}" style="text-decoration: none; color: inherit; display: block;">
            <div class="featured-card">
                <img src="{{ $hero->image_url }}" alt="{{ $hero->title }}" class="featured-img">
                <div class="featured-overlay"></div>
                <div class="featured-content">
                    <span class="featured-tag">Featured</span>
                    <h1 class="featured-title">{{ $hero->title }}</h1>
                    <p class="featured-desc">{{ $hero->short_description ?? Str::limit(strip_tags($hero->content), 180) }}</p>
                </div>
            </div>
        </a>
    </section>
    <!-- Top Blogs Grid Section -->
    <section class="top-blogs-section">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 48px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 16px;">Dive into Our Top Blogs</h2>
            <p style="color: var(--gray-600); font-size: 18px;">Explore our curated selection of top blogs, offering expert insights and valuable tips for your success.</p>
        </div>

        <div class="top-blogs-grid">
            @if($posts->count() > 1)
                @php $featured = $posts->get(1); @endphp
                <!-- Left: Featured Card -->
                <a href="{{ route('blogs.show', $featured->slug) }}" style="text-decoration: none; color: inherit;">
                    <div class="featured-blog-card">
                        <div>
                            <h3 style="font-size: 24px; margin-bottom: 16px;">{{ $featured->title }}</h3>
                            <p style="color: var(--gray-600); line-height: 1.6;">{{ $featured->short_description ?? Str::limit(strip_tags($featured->content), 150) }}</p>
                        </div>
                        <img src="{{ $featured->image_url }}" style="width: 100%; height: 320px; object-fit: cover; border-radius: 16px;">
                        <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #EAECF0; padding-top: 20px; margin-top: auto;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <img src="https://i.pravatar.cc/100?u={{ $featured->author->username }}" style="width: 32px; height: 32px; border-radius: 50%;">
                                <span style="font-weight: 600; font-size: 14px;">{{ $featured->author->name }}</span>
                            </div>
                            <div style="display: flex; gap: 12px; color: var(--gray-600); font-size: 12px;">
                                <span>{{ $featured->category }}</span>
                                <span>8 Min Read</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endif

            <!-- Right: Column -->
            <div>
                @foreach($posts->slice(2, 2) as $post)
                <a href="{{ route('blogs.show', $post->slug) }}" class="blog-card-small">
                    <img src="{{ $post->image_url }}" class="blog-card-img-small">
                    <div>
                        <div style="display: flex; gap: 12px; margin-bottom: 8px;">
                            <span class="tag-badge">{{ $post->category }}</span>
                            <span style="color: var(--gray-500); font-size: 12px;">14 Min Read</span>
                        </div>
                        <h4 style="font-size: 16px; font-weight: 600;">{{ $post->title }}</h4>
                    </div>
                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                </a>
                @endforeach

                @if($posts->count() > 4)
                    @php $large = $posts->get(4); @endphp
                    <a href="{{ route('blogs.show', $large->slug) }}" style="text-decoration: none; color: inherit;">
                        <div class="blog-card-large">
                            <img src="{{ $large->image_url }}" style="width: 100%; height: 200px; object-fit: cover;">
                            <div style="padding: 24px;">
                                <div style="display: flex; gap: 12px; margin-bottom: 12px;">
                                    <span class="tag-badge">{{ $large->category }}</span>
                                    <span style="color: var(--gray-500); font-size: 12px;">4 Min Read</span>
                                </div>
                                <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 12px;">{{ $large->title }}</h4>
                                <p style="color: var(--gray-600); font-size: 14px; line-height: 1.5;">{{ Str::limit(strip_tags($large->content), 100) }}</p>
                                <div class="arrow-icon" style="margin-top: 12px; transform: rotate(-45deg);"><i class="fas fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Recent Blog Section -->
    <section class="blog-section">
        <h2 class="section-title">Latest updates</h2>
        
        <div class="blog-grid">
            @foreach($posts->skip(5) as $post)
            <article class="blog-card">
                <a href="{{ route('blogs.show', $post->slug) }}" style="display: contents; text-decoration: none; color: inherit;">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="card-img">
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
        </div>

        <div style="text-align: center; margin-top: 48px;">
            <a href="{{ route('blogs.index') }}" class="auth-btn" style="text-decoration: none; display: inline-block;">View all posts</a>
        </div>
    </section>
    @else
    <div style="padding: 100px 0; text-align: center;">
        <h2>No blog posts found.</h2>
        <p>Check back later for exciting news!</p>
    </div>
    @endif
</div>
@endsection
