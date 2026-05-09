<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - WhiteCanvas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --admin-sidebar: #101828; --admin-sidebar-hover: #1D2939; }
        .admin-layout { display: grid; grid-template-columns: 280px 1fr; min-height: 100vh; }
        .admin-sidebar { background: var(--admin-sidebar); color: #fff; padding: 32px 16px; }
        .admin-nav-link { 
            display: flex; align-items: center; gap: 12px; padding: 12px 16px; 
            color: #D0D5DD; text-decoration: none; border-radius: 8px; margin-bottom: 4px;
            font-weight: 500;
        }
        .admin-nav-link:hover { background: var(--admin-sidebar-hover); color: #fff; }
        .admin-nav-link.active { background: #7F56D9; color: #fff; }
        .admin-main { background: #F9FAFB; padding: 48px; }
        .stat-card { background: #fff; padding: 24px; border-radius: 12px; border: 1px solid #EAECF0; }
        .stat-card .label { color: #667085; font-size: 14px; margin-bottom: 8px; }
        .stat-card .value { font-size: 30px; font-weight: 700; color: #101828; }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="logo" style="color: #fff; margin-bottom: 40px; padding-left: 16px;">
                <i class="fas fa-paint-brush"></i> WhiteCanvas Admin
            </div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> Overview
                </a>
                <a href="{{ route('admin.users') }}" class="admin-nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> User Management
                </a>
                <a href="{{ route('admin.blogs') }}" class="admin-nav-link {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i> Platform Blogs
                </a>
                <div style="margin-top: 40px; border-top: 1px solid #1D2939; padding-top: 24px;">
                    <a href="{{ url('/') }}" class="admin-nav-link">
                        <i class="fas fa-external-link-alt"></i> Back to Site
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="admin-nav-link" style="background: none; border: none; width: 100%; cursor: pointer;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>
        <main class="admin-main">
            @yield('admin_content')
        </main>
    </div>
</body>
</html>
