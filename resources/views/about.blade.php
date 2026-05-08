@extends('layouts.app')

@section('title', 'About Us - WhiteCanvas')

@section('content')
<!-- Hero Section -->
<section class="container about-hero">
    <p style="color: #6941C6; font-weight: 600; margin-bottom: 12px;">About us</p>
    <h1>We’re on a mission to build the best blog platform</h1>
    <p>We’re a team of designers, engineers, and content creators who are passionate about the power of storytelling. Our mission is to empower everyone to share their ideas with the world.</p>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <p style="color: #6941C6; font-weight: 600; margin-bottom: 12px;">Our values</p>
            <h2>How we work at Untitled</h2>
            <p style="margin-top: 16px;">Our values are the heart of our company. They guide how we build products and how we treat each other.</p>
        </div>

        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon"><i class="fas fa-heart"></i></div>
                <h3>Be kind</h3>
                <p>We believe in treating everyone with respect and kindness. We're all in this together.</p>
            </div>
            <div class="value-item">
                <div class="value-icon"><i class="fas fa-bolt"></i></div>
                <h3>Move fast</h3>
                <p>We're a fast-growing startup. We value speed and agility over perfection.</p>
            </div>
            <div class="value-item">
                <div class="value-icon"><i class="fas fa-users"></i></div>
                <h3>User first</h3>
                <p>We build for our users. Every decision we make starts with how it affects our community.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="container team-section">
    <div style="text-align: center; max-width: 800px; margin: 0 auto;">
        <p style="color: #6941C6; font-weight: 600; margin-bottom: 12px;">Our team</p>
        <h2>Meet the people behind the scenes</h2>
        <p style="margin-top: 16px;">We’re a small team with big dreams. We’re always looking for talented people to join our mission.</p>
    </div>

    <div class="team-grid">
        @php
            $team = [
                ['name' => 'Frankie Sullivan', 'role' => 'Founder & CEO', 'avatar' => 'https://i.pravatar.cc/300?u=frankie'],
                ['name' => 'Lana Steiner', 'role' => 'Product Designer', 'avatar' => 'https://i.pravatar.cc/300?u=lana'],
                ['name' => 'Jonathan Wills', 'role' => 'Software Engineer', 'avatar' => 'https://i.pravatar.cc/300?u=jonathan'],
                ['name' => 'Demi Wilkinson', 'role' => 'Marketing Manager', 'avatar' => 'https://i.pravatar.cc/300?u=demi'],
                ['name' => 'Candice Wu', 'role' => 'Frontend Developer', 'avatar' => 'https://i.pravatar.cc/300?u=candice'],
                ['name' => 'Natali Craig', 'role' => 'UX Researcher', 'avatar' => 'https://i.pravatar.cc/300?u=natali'],
                ['name' => 'Drew Cano', 'role' => 'Backend Engineer', 'avatar' => 'https://i.pravatar.cc/300?u=drew'],
                ['name' => 'Orlando Diggs', 'role' => 'Customer Success', 'avatar' => 'https://i.pravatar.cc/300?u=orlando'],
            ];
        @endphp

        @foreach($team as $member)
        <div class="team-card">
            <img src="{{ $member['avatar'] }}" alt="{{ $member['name'] }}" class="team-avatar">
            <h3 class="team-name">{{ $member['name'] }}</h3>
            <p class="team-role">{{ $member['role'] }}</p>
            <div class="team-socials">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-github"></i>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
