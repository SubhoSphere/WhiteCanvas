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
                    <button class="btn-signup" onclick="openModal()"><i class="fas fa-plus"></i> Create new post</button>
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

<!-- Create Post Modal -->
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

            <div class="form-group">
                <label class="form-label">Featured Image</label>
                <input type="file" class="form-input">
                <p style="font-size: 12px; color: var(--gray-600); margin-top: 6px;">Recommended size: 1200x630px.</p>
            </div>

            <div style="display: flex; align-items: center; gap: 12px; margin-top: 24px;">
                <input type="checkbox" id="publish_now">
                <label for="publish_now" style="font-size: 14px; font-weight: 500;">Publish immediately</label>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="button" class="btn-outline" onclick="closeModal()" style="flex: 1; border: 1px solid var(--gray-300); color: var(--gray-700);">Cancel</button>
                <button type="submit" class="btn-signup" style="flex: 2;">Create post</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('createPostModal').style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    function closeModal() {
        document.getElementById('createPostModal').style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Close on click outside
    window.onclick = function(event) {
        let modal = document.getElementById('createPostModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
@endsection
