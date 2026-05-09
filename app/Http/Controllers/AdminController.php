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

    public function blogs()
    {
        $blogs = Blog::with('author')->latest()->paginate(20);
        return view('admin.blogs', compact('blogs'));
    }

    public function toggleUserStatus($id)
    {
        // Logic to ban/unban user
        return back()->with('success', 'User status updated.');
    }

    public function deleteBlog($id)
    {
        Blog::findOrFail($id)->delete();
        return back()->with('success', 'Blog post deleted by admin.');
    }
}
