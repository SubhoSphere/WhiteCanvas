@extends('layouts.app')

@section('title', 'My Blogs - WhiteCanvas')

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
            <div id="blogs-management">
                <div class="dash-header">
                    <div>
                        <h3>My blog posts</h3>
                        <p>Manage your published and draft blog posts.</p>
                    </div>
                    <button class="btn-signup" onclick="openModal()"><i class="fas fa-plus"></i> Create new post</button>
                </div>

                @if(session('success'))
                    <div style="background: #ECFDF3; color: #027A48; padding: 12px; border-radius: 8px; margin-bottom: 24px; font-size: 14px;">
                        {{ session('success') }}
                    </div>
                @endif

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
                        @forelse($posts as $post)
                        <tr>
                            <td style="font-weight: 600; color: var(--gray-900);">{{ $post->title }}</td>
                            <td>
                                <span class="status-badge {{ $post->is_published ? 'status-published' : 'status-draft' }}">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td style="color: var(--gray-600);">{{ $post->created_at->format('M d, Y') }}</td>
                            <td>
                                <button class="action-btn" onclick='openEditModal({!! json_encode([
                                    "id" => $post->id,
                                    "title" => $post->title,
                                    "category" => $post->category,
                                    "short_description" => $post->short_description,
                                    "content" => $post->content,
                                    "update_url" => route("admin.blogs.update", $post->id)
                                ]) !!})'><i class="fas fa-edit"></i></button>
                                <form action="{{ route('admin.blogs.delete', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px; color: var(--gray-600);">You haven't written any posts yet.</td>
                        </tr>
                        @endforelse
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

        @if($errors->any())
            <div style="background: #FEF3F2; color: #B42318; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div class="form-group">
                    <label class="form-label">Post Title</label>
                    <input type="text" name="title" class="form-input" placeholder="e.g. 10 Tips for Product Design" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-input" required>
                        @foreach(['Technology', 'Business', 'Lifestyle', 'Education', 'Entertainment', 'Science', 'Design', 'News', 'Health', 'Finance'] as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-input" rows="2" placeholder="Brief summary for listings" required style="resize: vertical;"></textarea>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label">Full Content</label>
                <textarea name="content" class="form-input" rows="6" placeholder="Write your content here..." required style="resize: vertical;"></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Featured Image</label>
                <input type="file" name="image" class="form-input">
                <p style="font-size: 12px; color: var(--gray-600); margin-top: 6px;">Recommended size: 1200x630px.</p>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="button" class="btn-outline" onclick="closeModal()" style="flex: 1; border: 1px solid var(--gray-300); color: var(--gray-700);">Cancel</button>
                <button type="submit" class="btn-signup" style="flex: 2;">Create post</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Post Modal -->
<div class="modal-overlay" id="editPostModal">
    <div class="modal-content">
        <i class="fas fa-times modal-close" onclick="closeEditModal()"></i>
        <div class="auth-header" style="text-align: left; margin-bottom: 24px;">
            <h2>Edit blog post</h2>
            <p>Make changes to your post and keep it up to date.</p>
        </div>

        <form id="editPostForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div class="form-group">
                    <label class="form-label">Post Title</label>
                    <input type="text" name="title" id="edit_title" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category" id="edit_category" class="form-input" required>
                        @foreach(['Technology', 'Business', 'Lifestyle', 'Education', 'Entertainment', 'Science', 'Design', 'News', 'Health', 'Finance'] as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" id="edit_short_description" class="form-input" rows="2" required style="resize: vertical;"></textarea>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label">Full Content</label>
                <textarea name="content" id="edit_content" class="form-input" rows="6" required style="resize: vertical;"></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Update Image (Optional)</label>
                <input type="file" name="image" class="form-input">
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="button" class="btn-outline" onclick="closeEditModal()" style="flex: 1; border: 1px solid var(--gray-300); color: var(--gray-700);">Cancel</button>
                <button type="submit" class="btn-signup" style="flex: 2;">Save changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('createPostModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('createPostModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function closeEditModal() {
        document.getElementById('editPostModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function openEditModal(post) {
        document.getElementById('editPostForm').action = post.update_url;
        document.getElementById('edit_title').value = post.title;
        document.getElementById('edit_category').value = post.category;
        document.getElementById('edit_short_description').value = post.short_description;
        document.getElementById('edit_content').value = post.content;
        
        document.getElementById('editPostModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    @if($errors->any())
        $(document).ready(function() {
            openModal();
        });
    @endif

    window.onclick = function(event) {
        let createModal = document.getElementById('createPostModal');
        let editModal = document.getElementById('editPostModal');
        if (event.target == createModal) closeModal();
        if (event.target == editModal) closeEditModal();
    }
</script>
@endsection
