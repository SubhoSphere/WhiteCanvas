@extends('admin.layout')

@section('admin_content')
<div style="margin-bottom: 32px;">
    <h1 style="font-size: 30px; margin-bottom: 8px;">Platform Overview</h1>
    <p style="color: #667085;">Welcome back, Admin. Here is what's happening on WhiteCanvas today.</p>
</div>

<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 48px;">
    <div class="stat-card">
        <div class="label">Total Users</div>
        <div class="value">{{ $stats['total_users'] }}</div>
    </div>
    <div class="stat-card">
        <div class="label">Total Blogs</div>
        <div class="value">{{ $stats['total_blogs'] }}</div>
    </div>
    <div class="stat-card">
        <div class="label">Draft Posts</div>
        <div class="value">{{ $stats['pending_blogs'] }}</div>
    </div>
    <div class="stat-card">
        <div class="label">New Users (Today)</div>
        <div class="value">{{ $stats['new_users_today'] }}</div>
    </div>
</div>

<div class="dash-content" style="padding: 0; background: none; border: none;">
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
        <div class="stat-card" style="padding: 0; overflow: hidden;">
            <div style="padding: 20px; border-bottom: 1px solid #EAECF0; font-weight: 600;">Recent Activity</div>
            <div style="padding: 40px; text-align: center; color: #667085;">
                <i class="fas fa-history" style="font-size: 40px; margin-bottom: 16px; opacity: 0.2;"></i>
                <p>Activity logs will appear here once the system is live.</p>
            </div>
        </div>
        
        <div class="stat-card">
            <h4 style="margin-bottom: 16px;">System Status</h4>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; justify-content: space-between; font-size: 14px;">
                    <span>Database</span>
                    <span style="color: #027A48; font-weight: 600;"><i class="fas fa-check-circle"></i> Healthy</span>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 14px;">
                    <span>Storage</span>
                    <span style="color: #027A48; font-weight: 600;"><i class="fas fa-check-circle"></i> 12% Used</span>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 14px;">
                    <span>Mail Server</span>
                    <span style="color: #B54708; font-weight: 600;"><i class="fas fa-exclamation-triangle"></i> Pending</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
