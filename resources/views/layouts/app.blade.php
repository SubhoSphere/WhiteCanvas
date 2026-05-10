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

    <footer class="new-footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-cta">
                    <h2>Have a Cool Idea?<br>Let's Collaborate<span class="dot">.</span></h2>
                    <a href="{{ route('contact') }}" class="btn-contact">
                        Get In Touch <span class="plus">+</span>
                    </a>
                </div>
                <div class="footer-nav-grid" style="grid-column: span 2;">
                    <div class="footer-nav-col">
                        <h4>Location</h4>
                        <p>1330 Huffman Rd, Anchorage,<br>Alask, United States</p>
                    </div>
                    <div class="footer-nav-col">
                        <h4>Contact</h4>
                        <p>+661 2058 6987 20</p>
                        <a href="mailto:Hello@WhiteCanvas.com">Hello@WhiteCanvas.com</a>
                    </div>
                    <div class="footer-nav-col" style="margin-top: 40px;">
                        <h4>Social</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <a href="#">Instagram</a>
                            <a href="#">Twitter/X</a>
                            <a href="#">YouTube</a>
                            <a href="#">Pinterest</a>
                        </div>
                    </div>
                    <div class="footer-nav-col" style="margin-top: 40px;">
                        <h4>Helpful Links</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <a href="{{ route('privacy') }}">Privacy Policy</a>
                            <a href="{{ route('about') }}">About</a>
                            <a href="#">Services</a>
                            <a href="{{ route('blogs.index') }}">Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-mid">
                <p>&copy; WhiteCanvas {{ date('Y') }}</p>
                <p><span style="color: #E31B23;">#</span> Made with Love on WhiteCanvas</p>
                <div style="display: flex; align-items: center; gap: 8px;">
                    Created by 
                    <img src="https://i.pravatar.cc/100?u=admin" style="width: 24px; height: 24px; border-radius: 50%;">
                    <span style="color: #fff; font-weight: 600;">Subhash</span>
                </div>
            </div>
        </div>
        <div class="footer-huge-text">
            <div class="huge-label">WHITE CANVAS</div>
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
