@extends('layouts.app')

@section('title', 'Manage My Posts - WhiteCanvas')

@section('content')
<div class="container">
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="dash-sidebar">
            <a href="{{ route('dashboard') }}" class="dash-link"><i class="fas fa-user"></i> Profile Settings</a>
            <a href="{{ route('dashboard.posts') }}" class="dash-link active"><i class="fas fa-file-alt"></i> My Blog Posts</a>
            <a href="#" class="dash-link"><i class="fas fa-chart-line"></i> Analytics</a>
            <div style="margin-top: auto; border-top: 1px solid var(--gray-200); padding-top: 24px;">
                <a href="#" class="dash-link" style="color: #D92D20;"><i class="fas fa-sign-out-alt"></i> Log out</a>
            </div>
        </aside>

        <!-- Content -->
        <div class="dash-content">
            <div class="dash-header">
                <div>
                    <h2 style="font-size: 24px;">My blog posts</h2>
                    <p>You have published 48 posts this year. Keep it up!</p>
                </div>
                <button class="btn-signup" onclick="openModal()"><i class="fas fa-plus"></i> Create new post</button>
            </div>

            <!-- Stats Bar -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 32px;">
                <div style="padding: 20px; background: var(--gray-50); border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                    <div style="font-size: 14px; color: var(--gray-600); margin-bottom: 4px;">Total Views</div>
                    <div style="font-size: 24px; font-weight: 700;">128.4k</div>
                </div>
                <div style="padding: 20px; background: var(--gray-50); border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                    <div style="font-size: 14px; color: var(--gray-600); margin-bottom: 4px;">Avg. Engagement</div>
                    <div style="font-size: 24px; font-weight: 700;">4.2%</div>
                </div>
                <div style="padding: 20px; background: var(--gray-50); border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                    <div style="font-size: 14px; color: var(--gray-600); margin-bottom: 4px;">Shared Posts</div>
                    <div style="font-size: 24px; font-weight: 700;">842</div>
                </div>
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

<!-- Re-using Create Post Modal -->
<div class="modal-overlay" id="createPostModal">
    <div class="modal-content">
        <i class="fas fa-times modal-close" onclick="closeModal()"></i>
        <div class="auth-header" style="text-align: left; margin-bottom: 24px;">
            <h2>Create new blog post</h2>
            <p>Draft your next masterpiece and share it with the world.</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">Post Title</label>
                <input type="text" class="form-input" placeholder="e.g. 10 Tips for Product Design" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Content</label>
                <textarea class="form-input" rows="6" placeholder="Write your content here..." style="resize: vertical;"></textarea>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="button" class="btn-outline" onclick="closeModal()" style="flex: 1; border: 1px solid var(--gray-300); color: var(--gray-700);">Cancel</button>
                <button type="submit" class="btn-signup" style="flex: 2;">Create post</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() { document.getElementById('createPostModal').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
    function closeModal() { document.getElementById('createPostModal').style.display = 'none'; document.body.style.overflow = 'auto'; }
    window.onclick = function(event) { let modal = document.getElementById('createPostModal'); if (event.target == modal) closeModal(); }
</script>
@endsection
