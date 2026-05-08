@extends('layouts.app')

@section('title', 'Blog Detail - WhiteCanvas')

@section('content')
<div class="container">
    <div class="detail-layout">
        <!-- Main Post Area -->
        <div class="main-post-card">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2070&auto=format&fit=crop" alt="Main Post" class="featured-img">
            <div class="blur-overlay">
                <span class="featured-tag" style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 12px;">Category</span>
                <h2 style="margin-top: 16px; font-size: 28px;">Enhancing Team Collaboration with SaaS Products: A Game-Changer for Modern Workflows</h2>
                <div class="latest-post-meta" style="color: rgba(255,255,255,0.8); margin-top: 12px;">
                    Aug 10 • 10 min read
                </div>
            </div>
        </div>

        <!-- Sidebar Latest Posts -->
        <aside>
            <h3 style="font-size: 20px; margin-bottom: 24px;">Latest post</h3>
            <div class="latest-posts-widget">
                @for($i=1; $i<=4; $i++)
                <div class="latest-post-item">
                    <img src="https://i.pravatar.cc/150?u=post{{$i}}" alt="Post" class="latest-post-thumb">
                    <div class="latest-post-info">
                        <h5>Creating an Intuitive User Interface (UI) for Your SaaS Product</h5>
                        <div class="latest-post-meta">Aug 10 • 10 min read</div>
                    </div>
                </div>
                @endfor
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
            @for($i=1; $i<=3; $i++)
            <article class="founder-card">
                <div style="padding: 16px;">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=2070&auto=format&fit=crop" alt="Founder post" class="founder-card-img">
                    <div class="founder-card-content">
                        <span class="card-category" style="margin-bottom: 12px; display: block;">Category</span>
                        <h3>Our people make the difference</h3>
                        <p>We're an extension of your customer service team, and all of our resources are free. Chat to our friendly team 24/7 when you need help.</p>
                        <div class="latest-post-meta">Aug 10 • 10 min read</div>
                    </div>
                </div>
            </article>
            @endfor
        </div>
    </section>
</div>
@endsection
