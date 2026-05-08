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
        $posts = $this->getMockPosts();
        return view('blogs.index', compact('posts'));
    }

    public function index()
    {
        $posts = $this->getMockPosts();
        return view('blogs.all', compact('posts'));
    }

    public function dashboard()
    {
        $posts = $this->getMockPosts();
        return view('dashboard', compact('posts'));
    }

    public function myBlog($username)
    {
        $posts = $this->getMockPosts();
        return view('blogs.my-blog', compact('posts', 'username'));
    }

    public function myPosts()
    {
        $posts = $this->getMockPosts();
        return view('dashboard.my-posts', compact('posts'));
    }

    private function getMockPosts()
    {
        return [
            [
                'title' => 'Migrating to Linear 101',
                'category' => 'Design',
                'description' => 'Linear helps streamline software projects, sprints, tasks, and bug tracking. Here\'s how to get started.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015&auto=format&fit=crop',
                'author_name' => 'Jonathan Wills',
                'author_avatar' => 'https://i.pravatar.cc/150?u=jonathan',
                'date' => '18 Jan 2022'
            ],
            [
                'title' => 'Building your API Stack',
                'category' => 'Software Engineering',
                'description' => 'The rise of RESTful APIs has been met by a rise in tools for creating, testing, and managing them.',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=2070&auto=format&fit=crop',
                'author_name' => 'Lana Steiner',
                'author_avatar' => 'https://i.pravatar.cc/150?u=lana',
                'date' => '18 Jan 2022'
            ],
            [
                'title' => 'Bill Walsh leadership lessons',
                'category' => 'Management',
                'description' => 'Like to know the secrets of transforming a 2-14 team into a 3x Super Bowl winning Dynasty?',
                'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2070&auto=format&fit=crop',
                'author_name' => 'Alec Whitten',
                'author_avatar' => 'https://i.pravatar.cc/150?u=alec',
                'date' => '17 Jan 2022'
            ],
            [
                'title' => 'PM mental models',
                'category' => 'Product',
                'description' => 'Mental models are simple expressions of complex processes or relationships.',
                'image' => 'https://images.unsplash.com/photo-1512314889357-e157c22f938d?q=80&w=2071&auto=format&fit=crop',
                'author_name' => 'Demi Wilkinson',
                'author_avatar' => 'https://i.pravatar.cc/150?u=demi',
                'date' => '16 Jan 2022'
            ],
            [
                'title' => 'What is Wireframing?',
                'category' => 'Design',
                'description' => 'Introduction to Wireframing and its Principles. Learn from the best in the industry.',
                'image' => 'https://images.unsplash.com/photo-1586717791821-3f44a563eb4c?q=80&w=2070&auto=format&fit=crop',
                'author_name' => 'Candice Wu',
                'author_avatar' => 'https://i.pravatar.cc/150?u=candice',
                'date' => '15 Jan 2022'
            ],
            [
                'title' => 'How collaboration makes us better designers',
                'category' => 'Design',
                'description' => 'Collaboration can make our teams stronger, and our individual designs better.',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop',
                'author_name' => 'Natali Craig',
                'author_avatar' => 'https://i.pravatar.cc/150?u=natali',
                'date' => '14 Jan 2022'
            ]
        ];
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
        return view('blogs.show');
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
