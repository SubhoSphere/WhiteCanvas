@extends('layouts.app')

@section('title', 'Dashboard - WhiteCanvas')

@section('content')
<div class="container">
    <div class="dashboard-layout">
        <!-- Dashboard Sidebar -->
        <aside class="dash-sidebar">
            <a href="{{ route('dashboard') }}" class="dash-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile Settings</a>
            <a href="{{ route('dashboard.blogs') }}" class="dash-link {{ request()->routeIs('dashboard.blogs') ? 'active' : '' }}"><i class="fas fa-file-alt"></i> My Blog Posts</a>
            <a href="#" class="dash-link"><i class="fas fa-chart-line"></i> Analytics</a>
            <div style="margin-top: auto; border-top: 1px solid var(--gray-200); padding-top: 24px;">
                <form action="{{ route('logout') }}" method="POST" id="logout-form-dash" style="display: none;">@csrf</form>
                <a href="#" class="dash-link" style="color: #D92D20;" onclick="event.preventDefault(); document.getElementById('logout-form-dash').submit();">
                    <i class="fas fa-sign-out-alt"></i> Log out
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="dash-content">
            <!-- Profile Settings (Default View) -->
            <div id="profile-settings">
                <div class="dash-header">
                    <div>
                        <h3>Personal details</h3>
                        <p>Update your photo and personal details here.</p>
                    </div>
                    <button class="btn-signup">Save changes</button>
                </div>

                <form>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
                        @php 
                            $nameParts = explode(' ', auth()->user()->name, 2);
                            $firstName = $nameParts[0] ?? '';
                            $lastName = $nameParts[1] ?? '';
                        @endphp
                        <div class="form-group">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-input" value="{{ $firstName }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-input" value="{{ $lastName }}" readonly>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 32px;">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-input" value="{{ auth()->user()->email }}" readonly>
                    </div>

                    <div style="border-top: 1px solid var(--gray-200); padding-top: 32px; margin-top: 32px;">
                        <h3>Password</h3>
                        <p style="margin-bottom: 24px;">Update your password to stay secure.</p>
                        <div class="form-group">
                            <label class="form-label">Current password</label>
                            <input type="password" class="form-input" placeholder="••••••••" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">New password</label>
                            <input type="password" class="form-input" placeholder="••••••••" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
