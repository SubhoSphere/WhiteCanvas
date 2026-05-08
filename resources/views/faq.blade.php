@extends('layouts.app')

@section('title', 'FAQ - WhiteCanvas')

@section('content')
<div class="container">
    <div style="text-align: center; padding: 96px 0 48px;">
        <p style="color: #6941C6; font-weight: 600; margin-bottom: 12px;">Support</p>
        <h1 style="font-size: 48px;">Frequently asked questions</h1>
        <p style="font-size: 20px; color: var(--gray-600); margin-top: 24px;">Everything you need to know about the product and billing.</p>
    </div>

    <section class="faq-section">
        @php
            $faqs = [
                ['q' => 'Is there a free trial available?', 'a' => 'Yes, you can try WhiteCanvas free for 30 days. If you want, we’ll provide you with a free, personalized 30-minute onboarding call to get you up and running as soon as possible.'],
                ['q' => 'Can I change my plan later?', 'a' => 'Absolutely. You can upgrade or downgrade your plan at any time from your dashboard settings.'],
                ['q' => 'What is your cancellation policy?', 'a' => 'We understand that things change. You can cancel your subscription at any time with a single click from your account page.'],
                ['q' => 'Can other info be added to invoices?', 'a' => 'Yes, you can add your company name, VAT number, and address to your invoices from the billing settings in your dashboard.'],
                ['q' => 'How does billing work?', 'a' => 'We bill you at the start of each month. If you exceed your plan limits, we’ll simply notify you and adjust your next invoice accordingly.'],
            ];
        @endphp

        @foreach($faqs as $faq)
        <div class="faq-item" onclick="this.classList.toggle('active')">
            <div class="faq-question">
                {{ $faq['q'] }}
                <i class="fas fa-chevron-down faq-icon"></i>
            </div>
            <div class="faq-answer">
                {{ $faq['a'] }}
            </div>
        </div>
        @endforeach
    </section>

    <!-- Still have questions -->
    <div style="background: var(--gray-50); border-radius: var(--radius-xl); padding: 48px; text-align: center; margin: 96px 0;">
        <div style="display: flex; justify-content: center; margin-bottom: 24px;">
            <img src="https://i.pravatar.cc/100?u=1" style="width: 48px; height: 48px; border-radius: 50%; border: 2px solid white; margin-right: -12px;">
            <img src="https://i.pravatar.cc/100?u=2" style="width: 48px; height: 48px; border-radius: 50%; border: 2px solid white; margin-right: -12px; position: relative; z-index: 1;">
            <img src="https://i.pravatar.cc/100?u=3" style="width: 48px; height: 48px; border-radius: 50%; border: 2px solid white;">
        </div>
        <h3>Still have questions?</h3>
        <p style="margin: 12px 0 24px; color: var(--gray-600);">Can’t find the answer you’re looking for? Please chat to our friendly team.</p>
        <a href="{{ route('contact') }}" class="btn-signup">Get in touch</a>
    </div>
</div>
@endsection
