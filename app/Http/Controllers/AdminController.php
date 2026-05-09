<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;

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
        $blogs = Blog::with('author')->latest()->paginate(20);
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
            $path = $request->file('image')->store('blogs', 'public');
            $blog->file_path = $path;
        }

        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

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
            // Delete old image if exists
            if ($blog->file_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($blog->file_path);
            }
            $path = $request->file('image')->store('blogs', 'public');
            $blog->file_path = $path;
        }

        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->file_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($blog->file_path);
        }
        $blog->delete();
        return back()->with('success', 'Blog post deleted successfully.');
    }

    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        // Logic to ban/unban user would go here
        return back()->with('success', 'User status updated.');
    }
}
