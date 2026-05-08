@extends('layouts.app')

@section('title', 'Contact Us - WhiteCanvas')

@section('content')
<div class="container">
    <div class="contact-layout">
        <!-- Contact Information -->
        <div class="contact-info">
            <div>
                <p style="color: #6941C6; font-weight: 600; margin-bottom: 12px;">Contact us</p>
                <h1 style="font-size: 48px; margin-bottom: 24px;">Get in touch</h1>
                <p style="font-size: 20px; color: var(--gray-600);">Our friendly team would love to hear from you. We’re here to help you build your best blog.</p>
            </div>

            <div class="contact-card">
                <i class="far fa-envelope"></i>
                <div>
                    <h4>Email</h4>
                    <p>Our friendly team is here to help.</p>
                    <p style="color: #6941C6; font-weight: 600; margin-top: 8px;">hi@whitecanvas.com</p>
                </div>
            </div>

            <div class="contact-card">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h4>Office</h4>
                    <p>Come say hello at our office HQ.</p>
                    <p style="color: #6941C6; font-weight: 600; margin-top: 8px;">100 Smith St, Collingwood VIC 3066 AU</p>
                </div>
            </div>

            <div class="contact-card">
                <i class="fas fa-phone"></i>
                <div>
                    <h4>Phone</h4>
                    <p>Mon-Fri from 8am to 5pm.</p>
                    <p style="color: #6941C6; font-weight: 600; margin-top: 8px;">+1 (555) 000-0000</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="dash-content" style="padding: 40px;">
            <form action="#" method="POST">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
                    <div class="form-group">
                        <label class="form-label">First name</label>
                        <input type="text" class="form-input" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last name</label>
                        <input type="text" class="form-input" placeholder="Last name">
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 24px;">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" placeholder="you@company.com">
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <label class="form-label">Phone number</label>
                    <input type="text" class="form-input" placeholder="+1 (555) 000-0000">
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <label class="form-label">Message</label>
                    <textarea class="form-input" rows="5" placeholder="How can we help you?" style="resize: vertical;"></textarea>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 32px;">
                    <input type="checkbox" id="privacy" style="margin-top: 4px;">
                    <label for="privacy" style="font-size: 14px; color: var(--gray-600);">You agree to our friendly <a href="#" style="text-decoration: underline;">privacy policy</a>.</label>
                </div>

                <button type="submit" class="btn-signup" style="width: 100%; padding: 12px;">Send message</button>
            </form>
        </div>
    </div>
</div>
@endsection
