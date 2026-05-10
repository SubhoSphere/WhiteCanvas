<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WhiteCanvas - Industrial Blog Platform')</title>
    <meta name="description" content="@yield('meta_description', 'WhiteCanvas is a premium blog platform for high-quality technical and corporate content.')">
    <meta name="keywords" content="blog, laravel, technology, news, whitecanvas">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'WhiteCanvas - Industrial Blog Platform')">
    <meta property="og:description" content="@yield('meta_description', 'WhiteCanvas is a premium blog platform for high-quality technical and corporate content.')">
    <meta property="og:image" content="@yield('meta_image', asset('img/og-default.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'WhiteCanvas - Industrial Blog Platform')">
    <meta property="twitter:description" content="@yield('meta_description', 'WhiteCanvas is a premium blog platform for high-quality technical and corporate content.')">
    <meta property="twitter:image" content="@yield('meta_image', asset('img/og-default.png'))">

    @yield('meta')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav>
        <div class="container nav-content">
            <div class="nav-left">
                <a href="{{ url('/') }}" class="logo">
                    <i class="fas fa-paint-brush"></i> WhiteCanvas
                </a>
                <div class="nav-links">
                    <a href="{{ route('blogs.index') }}" class="nav-link">Blog</a>
                    <a href="{{ route('about') }}" class="nav-link">About us</a>
                </div>
            </div>
            <div class="nav-right">
                @guest
                    <a href="{{ route('login') }}" class="btn-login">Log in</a>
                    <a href="{{ route('register') }}" class="btn-signup">Sign up</a>
                @endguest
                @auth
                    <div style="display: flex; align-items: center;">
                        <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" style="display: flex; align-items: center;">
                            <img src="https://i.pravatar.cc/150?u={{ auth()->user()->username }}" alt="{{ auth()->user()->name }}" style="width: 38px; height: 38px; border-radius: 50%; border: 2px solid var(--gray-200); transition: 0.2s;" onmouseover="this.style.borderColor='#7F56D9'" onmouseout="this.style.borderColor='var(--gray-200)'">
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <section class="footer-cta">
        <div class="container cta-content">
            <h2>Let's get started on something great</h2>
            <p>Join over 4,000+ startups already growing with Untitled.</p>
            <div class="cta-btns">
                <a href="#" class="btn-outline">Chat to us</a>
                <a href="#" class="btn-signup">Get started</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col" style="grid-column: span 2;">
                    <div class="logo" style="margin-bottom: 24px; font-size: 20px;">
                        <i class="fas fa-paint-brush"></i> WhiteCanvas
                    </div>
                    <p style="color: var(--gray-500); line-height: 1.6; max-width: 320px;">
                        The premium blogging platform for creative professionals and industry leaders. Share your stories, build your brand, and inspire the world.
                    </p>
                </div>
                <div class="footer-col">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="{{ route('blogs.index') }}">Overview</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Tutorials</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="{{ route('faq') }}">Help centre</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Social</h4>
                    <ul>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                        <li><a href="#"><i class="fab fa-github"></i> GitHub</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} WhiteCanvas. Built with passion for the creative community.</p>
                <div class="footer-legal">
                    <a href="{{ route('privacy') }}">Privacy</a>
                    <a href="{{ route('terms') }}">Terms</a>
                    <a href="#">Cookies</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Global form submission handler
            $('form').on('submit', function() {
                const $form = $(this);
                const $submitBtn = $form.find('button[type="submit"], input[type="submit"]');
                
                // Add loading class to button
                $submitBtn.addClass('btn-loading');
                
                // Optional: prevent double submission
                // but usually the btn-loading pointer-events: none handles it
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
