<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::firstOrCreate(
            ['email' => 'admin@whitecanvas.com'],
            [
                'name' => 'Admin User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'admin',
                'username' => 'admin',
            ]
        );

        $blogs = [
            [
                'title' => 'Railway Group D Admit Card 2026 Out',
                'slug' => 'railway-group-d-admit-card-2026',
                'category' => 'Admit Card',
                'short_description' => 'Download your Railway Group D Admit Card for the upcoming examination starting next month.',
                'content' => 'Full details about the Railway Group D exam schedule and admit card download links...',
                'is_published' => true,
                'created_at' => now()->subDays(2),
            ],
            [
                'title' => 'SSC CGL Tier 1 Result Declared',
                'slug' => 'ssc-cgl-tier-1-result-2026',
                'category' => 'Result',
                'short_description' => 'The Staff Selection Commission has released the Tier 1 results for CGL 2026. Check your merit list here.',
                'content' => 'SSC CGL Results are finally out. Thousands of candidates appeared for the exam...',
                'is_published' => true,
                'created_at' => now()->subDays(5),
            ],
            [
                'title' => 'UPSC Prelims 2026 Notification',
                'slug' => 'upsc-prelims-2026-notification',
                'category' => 'Admit Card',
                'short_description' => 'UPSC has released the notification for Civil Services Exam 2026. Application starts today.',
                'content' => 'Everything you need to know about the UPSC CSE 2026 eligibility and syllabus...',
                'is_published' => true,
                'created_at' => now()->subDays(10),
            ],
            [
                'title' => 'Designing for the Modern Web',
                'slug' => 'designing-modern-web',
                'category' => 'Design',
                'short_description' => 'Explore the latest trends in UI/UX design and how to implement them in your projects.',
                'content' => 'Modern web design is about more than just aesthetics; it\'s about experience...',
                'is_published' => true,
                'created_at' => now()->subDays(1),
            ],
            [
                'title' => 'Laravel 12 New Features',
                'slug' => 'laravel-12-features',
                'category' => 'Engineering',
                'short_description' => 'A deep dive into the new features and improvements in Laravel 12 for high-performance apps.',
                'content' => 'Laravel 12 brings many internal optimizations and developer experience improvements...',
                'is_published' => true,
                'created_at' => now()->subMonths(1),
            ],
            [
                'title' => 'CBSE Board Exam Results 2026',
                'slug' => 'cbse-board-result-2026',
                'category' => 'Result',
                'short_description' => 'CBSE Class 10 and 12 results are expected to be announced by the second week of May.',
                'content' => 'Stay tuned for live updates on CBSE board results and toppers list...',
                'is_published' => true,
                'created_at' => now(),
            ],
        ];

        foreach ($blogs as $blog) {
            $blog['author_id'] = $admin->id;
            \App\Models\Blog::create($blog);
        }
    }
}
