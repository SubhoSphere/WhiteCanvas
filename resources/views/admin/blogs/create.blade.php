@extends('admin.layout')

@section('admin_content')
<div style="margin-bottom: 32px;">
    <a href="{{ route('admin.blogs') }}" style="text-decoration: none; color: #667085; font-size: 14px;">
        <i class="fas fa-arrow-left"></i> Back to Blogs
    </a>
    <h1 style="font-size: 30px; margin-top: 16px;">Create New Blog</h1>
</div>

<div class="stat-card" style="padding: 32px; background: #fff;">
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label style="display: block; font-weight: 500; margin-bottom: 8px;">Blog Title</label>
                <input type="text" name="title" class="form-input" placeholder="Enter blog title" required style="width: 100%;">
                @error('title') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display: block; font-weight: 500; margin-bottom: 8px;">Category</label>
                <select name="category" class="form-input" required style="width: 100%;">
                    <option value="">Select Category</option>
                    <option value="Admit Card">Admit Card</option>
                    <option value="Result">Result</option>
                    <option value="Design">Design</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Product">Product</option>
                </select>
                @error('category') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Short Description</label>
            <textarea name="short_description" class="form-input" rows="3" placeholder="Brief summary for listings" required style="width: 100%; height: auto;"></textarea>
            @error('short_description') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Blog Content</label>
            <textarea name="content" class="form-input" rows="10" placeholder="Write your blog content here..." required style="width: 100%; height: auto;"></textarea>
            @error('content') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label style="display: block; font-weight: 500; margin-bottom: 8px;">Feature Image</label>
            <input type="file" name="image" class="form-input" style="width: 100%; padding: 10px;">
            <p style="font-size: 12px; color: #667085; margin-top: 4px;">Recommended size: 1200x600px. Max size: 2MB.</p>
            @error('image') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 12px; justify-content: flex-end;">
            <a href="{{ route('admin.blogs') }}" class="btn-outline" style="text-decoration: none; padding: 10px 24px;">Cancel</a>
            <button type="submit" class="btn-signup" style="padding: 10px 24px;">Create Blog Post</button>
        </div>
    </form>
</div>
@endsection
