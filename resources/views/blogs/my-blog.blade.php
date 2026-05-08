@extends('layouts.app')

@section('title', 'Frankie Sullivan\'s Blog - WhiteCanvas')

@section('content')
<!-- Author Profile Header -->
<header class="author-header">
    <div class="container">
        <img src="https://i.pravatar.cc/300?u=frankie" alt="Frankie Sullivan" class="author-profile-img">
        <h1 style="font-size: 36px; margin-bottom: 8px;">Frankie Sullivan</h1>
        <p style="font-size: 18px; color: var(--gray-600); max-width: 600px; margin: 0 auto;">Founder of WhiteCanvas. I write about product design, engineering management, and the future of SaaS.</p>
        
        <div class="author-stats">
            <div class="stat-item">
                <span class="stat-value">48</span>
                <span class="stat-label">Posts</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">12.4k</span>
                <span class="stat-label">Readers</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">156</span>
                <span class="stat-label">Following</span>
            </div>
        </div>

        <div style="margin-top: 32px; display: flex; justify-content: center; gap: 12px;">
            <button class="btn-signup"><i class="fas fa-plus"></i> Follow</button>
            <button class="btn-outline" style="border: 1px solid var(--gray-300); color: var(--gray-700);">Contact</button>
        </div>
    </div>
</header>

<!-- Author's Posts Grid -->
<div class="container" style="padding: 64px 0;">
    <h2 class="section-title">Latest from Frankie</h2>
    <div class="blog-grid">
        @foreach($posts as $post)
        <article class="blog-card">
            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="card-img">
            <div class="card-content">
                <span class="card-category">{{ $post['category'] }}</span>
                <h3 class="card-title">{{ $post['title'] }}</h3>
                <p class="card-desc">{{ $post['description'] }}</p>
                <div class="card-footer">
                    <span class="post-date">{{ $post['date'] }} • 10 min read</span>
                </div>
            </div>
        </article>
        @endforeach
    </div>

    <button class="load-more">Show more posts</button>
</div>
@endsection
