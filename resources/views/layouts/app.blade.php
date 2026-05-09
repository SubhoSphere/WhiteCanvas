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
                <a href="{{ route('login') }}" class="btn-login">Log in</a>
                <a href="{{ route('register') }}" class="btn-signup">Sign up</a>
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

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="#">Overview</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Help centre</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Use cases</h4>
                    <ul>
                        <li><a href="#">Startups</a></li>
                        <li><a href="#">Enterprise</a></li>
                        <li><a href="#">Government</a></li>
                        <li><a href="#">SaaS centre</a></li>
                        <li><a href="#">Marketplaces</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Social</h4>
                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">LinkedIn</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Dribbble</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">Licenses</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="logo"><i class="fas fa-paint-brush"></i> WhiteCanvas</div>
                <p>&copy; {{ date('Y') }} WhiteCanvas. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('scripts')
</body>
</html>
