@extends('admin.layout')

@section('admin_content')
<div style="margin-bottom: 32px; display: flex; justify-content: space-between; align-items: flex-end;">
    <div>
        <h1 style="font-size: 30px; margin-bottom: 8px;">User Management</h1>
        <p style="color: #667085;">View and manage all registered users on the platform.</p>
    </div>
    <div style="display: flex; gap: 12px;">
        <button class="btn-outline" style="background: #fff; border: 1px solid #D0D5DD; color: #344054;"><i class="fas fa-download"></i> Export CSV</button>
    </div>
</div>

<div class="stat-card" style="padding: 0; overflow: hidden;">
    <table class="dash-table" style="margin: 0;">
        <thead>
            <tr>
                <th>User</th>
                <th>Role</th>
                <th>Joined Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <img src="https://i.pravatar.cc/100?u={{ $user->id }}" style="width: 40px; height: 40px; border-radius: 50%;">
                        <div>
                            <div style="font-weight: 600; color: #101828;">{{ $user->name }}</div>
                            <div style="font-size: 13px; color: #667085;">{{ $user->email }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <span style="font-size: 13px; font-weight: 500; color: #344054;">{{ $user->role }}</span>
                </td>
                <td style="color: #667085;">{{ $user->created_at->format('M d, Y') }}</td>
                <td>
                    <span class="status-badge {{ $user->email_verified_at ? 'status-published' : 'status-draft' }}">
                        {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                    </span>
                </td>
                <td>
                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                    <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="action-btn btn-delete" title="{{ $user->role === 'banned' ? 'Unban User' : 'Ban User' }}">
                            <i class="fas fa-{{ $user->role === 'banned' ? 'undo' : 'ban' }}"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="padding: 16px; border-top: 1px solid #EAECF0; background: #fff;">
        {{ $users->links() }}
    </div>
</div>
@endsection
