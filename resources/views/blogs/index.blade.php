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

    <!-- Blog Section -->
    <section class="blog-section">
        <h2 class="section-title">Recent blog posts</h2>
        
        <div class="blog-grid">
            @foreach($posts->skip(1) as $post)
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
