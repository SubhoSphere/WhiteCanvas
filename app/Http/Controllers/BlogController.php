<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $posts = Blog::with('author')->published()->latest()->take(6)->get();
        return view('blogs.index', compact('posts'));
    }

    public function index()
    {
        $posts = Blog::with('author')->published()->latest()->paginate(9);
        $categories = Blog::select('category')->distinct()->pluck('category');
        return view('blogs.all', compact('posts', 'categories'));
    }

    public function filter(Request $request)
    {
        $query = Blog::with('author')->published();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $posts = $query->latest()->paginate(9);

        if ($request->ajax()) {
            return view('blogs.partials._blog_list', compact('posts'))->render();
        }

        return redirect()->route('blogs.index');
    }

    public function dashboard()
    {
        $posts = Blog::where('author_id', auth()->id())->latest()->get();
        return view('dashboard', compact('posts'));
    }

    public function myBlog($username)
    {
        $user = \App\Models\User::where('username', $username)->firstOrFail();
        $posts = $user->blogs()->published()->latest()->get();
        return view('blogs.my-blog', compact('posts', 'username'));
    }

    public function myPosts()
    {
        $posts = Blog::where('author_id', auth()->id())->latest()->get();
        return view('dashboard.my-blogs', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Blog::with('author')->where('slug', $slug)->published()->firstOrFail();
        $latestPosts = Blog::where('id', '!=', $post->id)->published()->latest()->take(4)->get();
        return view('blogs.show', compact('post', 'latestPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
