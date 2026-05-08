@extends('layouts.app')

@section('title', 'Recent Blog Posts - WhiteCanvas')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <section class="hero">
        <div class="featured-card">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop" alt="Featured Post" class="featured-img">
            <div class="featured-overlay"></div>
            <div class="featured-content">
                <span class="featured-tag">Featured</span>
                <h1 class="featured-title">Breaking Into Product Design: Advice from Untitled Founder, Frankie</h1>
                <p class="featured-desc">Let's get one thing out of the way: you don't need a fancy Bachelor's Degree to get into Product Design. We sat down with Frankie Sullivan to talk about developing in product design and how anyone can get into this growing industry.</p>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <h2 class="section-title">Recent blog posts</h2>
        
        <div class="blog-grid">
            @foreach($posts as $post)
            <article class="blog-card">
                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="card-img">
                <div class="card-content">
                    <span class="card-category">{{ $post['category'] }}</span>
                    <h3 class="card-title">{{ $post['title'] }}</h3>
                    <p class="card-desc">{{ $post['description'] }}</p>
                    <div class="card-footer">
                        <img src="{{ $post['author_avatar'] }}" alt="{{ $post['author_name'] }}" class="author-avatar">
                        <div class="author-info">
                            <span class="author-name">{{ $post['author_name'] }}</span>
                            <span class="post-date">{{ $post['date'] }}</span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <button class="load-more">Loading more...</button>
    </section>
</div>
@endsection
