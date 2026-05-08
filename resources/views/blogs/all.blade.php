@extends('layouts.app')

@section('title', 'All Blogs - WhiteCanvas')

@section('content')
<div class="container">
    <div class="blog-layout">
        <!-- Main Content -->
        <div class="blog-list">
            <h2 class="section-title" style="margin-bottom: 32px;">All blog posts</h2>
            
            @foreach($posts as $post)
            <article class="blog-list-item">
                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="item-img">
                <div class="card-content">
                    <span class="card-category">{{ $post['category'] }}</span>
                    <h3 class="card-title">{{ $post['title'] }}</h3>
                    <p class="card-desc">{{ Str::limit($post['description'], 120) }}</p>
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

            <!-- Pagination Placeholder -->
            <div style="display: flex; gap: 8px; margin-top: 32px;">
                <button class="tag" style="background: var(--gray-900); color: white;">1</button>
                <button class="tag">2</button>
                <button class="tag">3</button>
                <span style="align-self: center;">...</span>
                <button class="tag">10</button>
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-widget">
                <div class="search-box">
                    <i class="fas fa-search" style="color: var(--gray-300);"></i>
                    <input type="text" placeholder="Search blog posts...">
                </div>
            </div>

            <div class="sidebar-widget">
                <h4>Categories</h4>
                <ul class="filter-list">
                    <li class="filter-item">
                        <a href="#">
                            All Categories <span class="filter-count">24</span>
                        </a>
                    </li>
                    <li class="filter-item">
                        <a href="#">
                            Design <span class="filter-count">12</span>
                        </a>
                    </li>
                    <li class="filter-item">
                        <a href="#">
                            Software Engineering <span class="filter-count">8</span>
                        </a>
                    </li>
                    <li class="filter-item">
                        <a href="#">
                            Product <span class="filter-count">4</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-widget">
                <h4>Popular Tags</h4>
                <div class="tag-cloud">
                    <a href="#" class="tag">Design</a>
                    <a href="#" class="tag">UX/UI</a>
                    <a href="#" class="tag">Laravel</a>
                    <a href="#" class="tag">PHP</a>
                    <a href="#" class="tag">Productivity</a>
                    <a href="#" class="tag">Engineering</a>
                </div>
            </div>

            <div class="sidebar-widget">
                <h4>Newsletter</h4>
                <p style="font-size: 14px; margin-bottom: 16px;">Get the latest posts delivered right to your inbox.</p>
                <input type="email" class="form-input" placeholder="Enter your email" style="margin-bottom: 12px;">
                <button class="auth-btn" style="margin-top: 0;">Subscribe</button>
            </div>
        </aside>
    </div>
</div>
@endsection
