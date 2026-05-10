@extends('admin.layout')

@section('admin_content')
<div style="margin-bottom: 32px;">
    <a href="{{ route('admin.blogs') }}" style="text-decoration: none; color: #667085; font-size: 14px;">
        <i class="fas fa-arrow-left"></i> Back to Blogs
    </a>
    <h1 style="font-size: 30px; margin-top: 16px;">Edit Blog Post</h1>
</div>

<div class="stat-card" style="padding: 32px; background: #fff;">
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label style="display: block; font-weight: 500; margin-bottom: 8px;">Blog Title</label>
                <input type="text" name="title" value="{{ $blog->title }}" class="form-input" placeholder="Enter blog title" required style="width: 100%;">
                @error('title') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display: block; font-weight: 500; margin-bottom: 8px;">Category</label>
                <select name="category" class="form-input" required style="width: 100%;">
                    <option value="">Select Category</option>
                    @foreach(['Technology', 'Business', 'Lifestyle', 'Education', 'Entertainment', 'Science', 'Design', 'News', 'Health', 'Finance'] as $cat)
                        <option value="{{ $cat }}" {{ $blog->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
                @error('category') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Short Description</label>
            <textarea name="short_description" class="form-input" rows="3" placeholder="Brief summary for listings" required style="width: 100%; height: auto;">{{ $blog->short_description }}</textarea>
            @error('short_description') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Blog Content</label>
            <textarea name="content" class="form-input" rows="10" placeholder="Write your blog content here..." required style="width: 100%; height: auto;">{{ $blog->content }}</textarea>
            @error('content') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Feature Image</label>
            @if($blog->file_path)
                <div style="margin-bottom: 12px;">
                    <img src="{{ $blog->image_url }}" alt="Current Image" style="width: 200px; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid #EAECF0;">
                </div>
            @endif
            <input type="file" name="image" class="form-input" style="width: 100%; padding: 10px;">
            <p style="font-size: 12px; color: #667085; margin-top: 4px;">Leave empty to keep current image. Max size: 2MB.</p>
            @error('image') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 12px; justify-content: flex-end;">
            <a href="{{ route('admin.blogs') }}" class="btn-outline" style="text-decoration: none; padding: 10px 24px;">Cancel</a>
            <button type="submit" class="btn-signup" style="padding: 10px 24px;">Update Blog Post</button>
        </div>
    </form>
</div>
@endsection
