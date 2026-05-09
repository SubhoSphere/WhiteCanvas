@extends('admin.layout')

@section('admin_content')
<div style="margin-bottom: 32px; display: flex; justify-content: space-between; align-items: flex-end;">
    <div>
        <h1 style="font-size: 30px; margin-bottom: 8px;">Platform Blogs</h1>
        <p style="color: #667085;">Monitor and moderate all blog content published on WhiteCanvas.</p>
    </div>
    <div style="display: flex; gap: 12px;">
        <a href="{{ route('admin.blogs.create') }}" class="btn-signup" style="text-decoration: none; padding: 10px 20px; font-size: 14px;">
            <i class="fas fa-plus"></i> Add New Blog
        </a>
    </div>
</div>

@if(session('success'))
    <div style="background: #D1FAE5; color: #065F46; padding: 12px; border-radius: 8px; margin-bottom: 24px;">
        {{ session('success') }}
    </div>
@endif

<div class="stat-card" style="padding: 0; overflow: hidden;">
    <table class="dash-table" style="margin: 0;">
        <thead>
            <tr>
                <th>Post Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>
                    <div style="font-weight: 600; color: #101828;">{{ $blog->title }}</div>
                    <div style="font-size: 12px; color: #667085;">{{ $blog->slug }}</div>
                </td>
                <td>
                    <div style="font-size: 14px; color: #344054;">{{ $blog->author->name }}</div>
                </td>
                <td>
                    <span class="tag" style="background: #F2F4F7; color: #344054;">{{ $blog->category }}</span>
                </td>
                <td>
                    <span class="status-badge {{ $blog->is_published ? 'status-published' : 'status-draft' }}">
                        {{ $blog->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="action-btn" target="_blank" title="View"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="action-btn" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="padding: 16px; border-top: 1px solid #EAECF0; background: #fff;">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
