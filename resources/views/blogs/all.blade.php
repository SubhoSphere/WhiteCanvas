@extends('layouts.app')

@section('title', 'All Blogs - WhiteCanvas')
@section('meta_description', 'Browse our complete collection of blog posts, from exam updates to design and engineering insights.')

@section('content')
<div class="container">
    <div class="blog-layout">
        <!-- Main Content -->
        <div class="blog-list">
            <h2 class="section-title" style="margin-bottom: 32px;">All blog posts</h2>
            
            <div id="blog-posts-container" class="blog-list">
                @include('blogs.partials._blog_list')
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
                        <a href="#" class="category-filter active" data-category="">
                            All Categories
                        </a>
                    </li>
                    @foreach($categories as $category)
                    <li class="filter-item">
                        <a href="#" class="category-filter" data-category="{{ $category }}">
                            {{ $category }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar-widget">
                <h4>Filter by Date</h4>
                <input type="date" id="date-filter" class="form-input" style="margin-top: 12px;">
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

@push('scripts')
<script>
$(document).ready(function() {
    let currentCategory = '';
    let currentDate = '';

    function fetchPosts(page = 1) {
        $.ajax({
            url: "{{ route('blogs.filter') }}",
            data: {
                category: currentCategory,
                date: currentDate,
                page: page
            },
            beforeSend: function() {
                $('#blog-posts-container').css('opacity', '0.5');
            },
            success: function(data) {
                $('#blog-posts-container').html(data);
                $('#blog-posts-container').css('opacity', '1');
            }
        });
    }

    $('.category-filter').on('click', function(e) {
        e.preventDefault();
        $('.category-filter').removeClass('active');
        $(this).addClass('active');
        currentCategory = $(this).data('category');
        fetchPosts();
    });

    $('#date-filter').on('change', function() {
        currentDate = $(this).val();
        fetchPosts();
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetchPosts(page);
    });
});
</script>
<style>
    .category-filter.active {
        font-weight: bold;
        color: var(--primary-600);
    }
</style>
@endpush
@endsection
