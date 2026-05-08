@extends('layouts.app')

@section('title', 'Page Not Found - WhiteCanvas')

@section('content')
<div class="container error-wrapper">
    <p class="error-code">404 error</p>
    <h1 class="error-title">We can’t find that page</h1>
    <p class="error-desc">Sorry, the page you are looking for doesn't exist or has been moved. Try going back to the homepage or search our blog.</p>
    
    <div class="error-btns">
        <a href="javascript:history.back()" class="btn-outline" style="color: var(--gray-700); border: 1px solid var(--gray-300);">
            <i class="fas fa-arrow-left"></i> Go back
        </a>
        <a href="{{ url('/') }}" class="btn-signup">Take me home</a>
    </div>
</div>
@endsection
