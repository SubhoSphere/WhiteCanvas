@extends('layouts.app')

@section('title', 'Dashboard - WhiteCanvas')

@section('content')
<div class="container">
    <div class="dashboard-layout">
        <!-- Dashboard Sidebar -->
        <aside class="dash-sidebar">
            <a href="#" class="dash-link active"><i class="fas fa-user"></i> Profile Settings</a>
            <a href="#" class="dash-link"><i class="fas fa-file-alt"></i> My Blog Posts</a>
            <a href="#" class="dash-link"><i class="fas fa-chart-line"></i> Analytics</a>
            <div style="margin-top: auto; border-top: 1px solid var(--gray-200); padding-top: 24px;">
                <a href="#" class="dash-link" style="color: #D92D20;"><i class="fas fa-sign-out-alt"></i> Log out</a>
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
                        <div class="form-group">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-input" value="Frankie">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-input" value="Sullivan">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 32px;">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-input" value="frankie@whitecanvas.com">
                    </div>

                    <div style="border-top: 1px solid var(--gray-200); padding-top: 32px; margin-top: 32px;">
                        <h3>Password</h3>
                        <p style="margin-bottom: 24px;">Update your password to stay secure.</p>
                        <div class="form-group">
                            <label class="form-label">Current password</label>
                            <input type="password" class="form-input" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <label class="form-label">New password</label>
                            <input type="password" class="form-input" placeholder="••••••••">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Blogs Management (Hidden by default in real app, but showing here for design) -->
            <div id="blogs-management" style="margin-top: 64px; border-top: 2px solid var(--gray-100); padding-top: 64px;">
                <div class="dash-header">
                    <div>
                        <h3>My blog posts</h3>
                        <p>Manage your published and draft blog posts.</p>
                    </div>
                    <button class="btn-signup"><i class="fas fa-plus"></i> Create new post</button>
                </div>

                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>Status</th>
                            <th>Date Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td style="font-weight: 600; color: var(--gray-900);">{{ $post['title'] }}</td>
                            <td>
                                <span class="status-badge {{ $loop->index % 2 == 0 ? 'status-published' : 'status-draft' }}">
                                    {{ $loop->index % 2 == 0 ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td style="color: var(--gray-600);">{{ $post['date'] }}</td>
                            <td>
                                <button class="action-btn"><i class="fas fa-edit"></i></button>
                                <button class="action-btn btn-delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
