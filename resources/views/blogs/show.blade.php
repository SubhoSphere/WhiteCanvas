@extends('layouts.app')

@section('title', $post->title . ' - WhiteCanvas')
@section('meta_description', $post->short_description ?? Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->image_url)

@section('meta')
    <meta property="og:type" content="article">
    <meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}">
    <meta property="article:author" content="{{ $post->author->name }}">
    <meta property="article:section" content="{{ $post->category }}">
@endsection

@section('content')
<div class="container">
    <div class="detail-layout">
        <!-- Main Post Area -->
        <div class="main-post-card" style="height: auto; overflow: visible;">
            <div style="position: relative; border-radius: var(--radius-xl); overflow: hidden; height: 480px;">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="featured-img">
            </div>
            
            <div class="post-header" style="padding: 40px 40px 0;">
                <span class="card-category" style="margin-bottom: 16px; display: block;">{{ $post->category }}</span>
                <h1 style="font-size: 48px; margin-bottom: 24px; color: var(--gray-900);">{{ $post->title }}</h1>
                <div class="latest-post-meta" style="color: var(--gray-600); margin-bottom: 32px; font-size: 16px;">
                    {{ $post->created_at->format('M d, Y') }} • {{ ceil(strlen(strip_tags($post->content)) / 1000) }} min read
                </div>
            </div>
            
            <div class="post-body" style="padding: 0 40px 40px; line-height: 1.8; font-size: 18px; color: var(--gray-700);">
                @if($post->short_description)
                    <p style="font-weight: 600; font-size: 20px; color: var(--gray-900); margin-bottom: 32px; border-left: 4px solid var(--gray-900); padding-left: 20px;">
                        {{ $post->short_description }}
                    </p>
                @endif
                
                {!! nl2br(e($post->content)) !!}
            </div>

            <div class="post-footer" style="padding: 40px; border-top: 1px solid var(--gray-200); display: flex; align-items: center; gap: 20px;">
                <img src="https://i.pravatar.cc/150?u={{ $post->author->username }}" alt="{{ $post->author->name }}" style="width: 64px; height: 64px; border-radius: 50%;">
                <div>
                    <h4 style="margin: 0; font-size: 18px;">Written by {{ $post->author->name }}</h4>
                    <p style="margin: 4px 0 0; font-size: 14px; color: var(--gray-600);">Published on {{ $post->created_at->format('F d, Y') }} in {{ $post->category }}</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Latest Posts -->
        <aside>
            <h3 style="font-size: 20px; margin-bottom: 24px;">Latest post</h3>
            <div class="latest-posts-widget">
                @foreach($latestPosts as $lPost)
                <div class="latest-post-item" style="margin-bottom: 20px;">
                    <a href="{{ route('blogs.show', $lPost->slug) }}" style="text-decoration: none; display: flex; gap: 16px; color: inherit;">
                        <img src="{{ $lPost->image_url }}" alt="{{ $lPost->title }}" class="latest-post-thumb" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                        <div class="latest-post-info">
                            <h5 style="margin: 0; font-size: 14px; line-height: 1.4;">{{ $lPost->title }}</h5>
                            <div class="latest-post-meta" style="font-size: 12px; margin-top: 4px;">{{ $lPost->created_at->format('M d') }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </aside>
    </div>

    <!-- Founders Corner -->
    <section class="founders-section">
        <div class="founders-header">
            <h2 style="font-size: 24px;">Founders corner</h2>
            <div style="display: flex; gap: 12px;">
                <button class="tag" style="border-radius: 50%; width: 40px; height: 40px; padding: 0;"><i class="fas fa-arrow-left"></i></button>
                <button class="tag" style="border-radius: 50%; width: 40px; height: 40px; padding: 0;"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        
        <div class="founders-grid">
            @foreach($latestPosts->take(3) as $fPost)
            <article class="founder-card">
                <a href="{{ route('blogs.show', $fPost->slug) }}" style="text-decoration: none; color: inherit;">
                    <div style="padding: 16px;">
                        <img src="{{ $fPost->image_url }}" alt="{{ $fPost->title }}" class="founder-card-img">
                        <div class="founder-card-content">
                            <span class="card-category" style="margin-bottom: 12px; display: block;">{{ $fPost->category }}</span>
                            <h3>{{ $fPost->title }}</h3>
                            <p>{{ $fPost->short_description ?? Str::limit(strip_tags($fPost->content), 100) }}</p>
                            <div class="latest-post-meta">{{ $fPost->created_at->format('M d') }}</div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </section>
</div>
@endsection
