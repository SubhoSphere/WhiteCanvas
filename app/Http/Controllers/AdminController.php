<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_blogs' => Blog::count(),
            'pending_blogs' => Blog::where('is_published', false)->count(),
            'new_users_today' => User::whereDate('created_at', today())->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function index()
    {
        $query = Blog::with('author');
        
        // If not admin, only show their own blogs
        if (!auth()->user()->isAdmin()) {
            $query->where('author_id', auth()->id());
        }

        $blogs = $query->latest()->paginate(20);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = new Blog($request->all());
        $blog->slug = \Illuminate\Support\Str::slug($request->title) . '-' . time();
        $blog->author_id = auth()->id();
        $blog->is_published = true;

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image')->storeOnCloudinary('blogs');
            $blog->file_path = $uploadedFile->getSecurePath();
            $blog->cloud_public_id = $uploadedFile->getPublicId();
        }

        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        // Authorization check
        if ($blog->author_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Authorization check
        if ($blog->author_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog->fill($request->all());
        
        if ($request->title !== $blog->getOriginal('title')) {
            $blog->slug = \Illuminate\Support\Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            // Delete old image from Cloudinary if exists
            if ($blog->cloud_public_id) {
                Cloudinary::destroy($blog->cloud_public_id);
            }
            
            $uploadedFile = $request->file('image')->storeOnCloudinary('blogs');
            $blog->file_path = $uploadedFile->getSecurePath();
            $blog->cloud_public_id = $uploadedFile->getPublicId();
        }

        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Authorization check
        if ($blog->author_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        // Delete image from Cloudinary if exists
        if ($blog->cloud_public_id) {
            Cloudinary::destroy($blog->cloud_public_id);
        }
        $blog->delete();
        return back()->with('success', 'Blog post deleted successfully.');
    }

    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent banning yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot ban yourself.');
        }

        if ($user->role === 'banned') {
            $user->role = 'user';
            $message = 'User has been unbanned.';
        } else {
            $user->role = 'banned';
            $message = 'User has been banned.';
        }

        $user->save();

        return back()->with('success', $message);
    }
}
