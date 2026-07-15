<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Console | Fame House Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #080a0e;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #000000;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
            padding: 2.5rem 1.8rem;
            box-sizing: border-box;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 3.5rem;
            text-decoration: none;
            color: #ffffff;
        }

        .brand-img {
            height: 36px;
        }

        .brand-text {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1.2rem;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .menu-link:hover, .menu-link.active {
            background: rgba(249, 199, 0, 0.08);
            color: var(--primary-color);
        }

        .logout-btn-wrapper {
            margin-top: auto;
        }

        .sidebar-logout-btn {
            background: transparent;
            border: 1px solid rgba(255, 62, 108, 0.25);
            color: #ff3e6c;
            width: 100%;
            padding: 0.9rem;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            transition: all 0.3s;
        }

        .sidebar-logout-btn:hover {
            background: #ff3e6c;
            color: #ffffff;
        }

        /* Main Workspace Content */
        .workspace {
            flex-grow: 1;
            padding: 3rem 4rem;
            box-sizing: border-box;
            background: radial-gradient(circle at top right, rgba(249, 199, 0, 0.02) 0%, transparent 60%);
        }

        .workspace-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .workspace-title h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .workspace-title p {
            color: var(--text-secondary);
            font-size: 0.92rem;
            margin: 0.4rem 0 0 0;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 2rem;
            box-sizing: border-box;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        /* Table Customizations for Messages */
        .messages-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .messages-table th {
            text-align: left;
            padding: 1.1rem 1.5rem;
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .messages-table td {
            padding: 1.2rem 1.5rem;
            font-size: 0.92rem;
            color: rgba(255, 255, 255, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            vertical-align: middle;
        }

        .messages-table tr:hover td {
            background: rgba(255, 255, 255, 0.01);
        }

        .status-badge {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.unread {
            background: rgba(249, 199, 0, 0.1);
            color: var(--primary-color);
            border: 1px solid rgba(249, 199, 0, 0.2);
        }

        .status-badge.read {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Message Detail Lightbox Modal */
        .message-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 12000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .message-modal.active {
            display: flex;
            opacity: 1;
        }

        .msg-modal-content {
            background: #0d0f14;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            width: 90%;
            max-width: 580px;
            padding: 2.5rem;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8);
            position: relative;
        }

        .msg-modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.4);
            font-size: 1.8rem;
            cursor: pointer;
            transition: color 0.3s;
        }

        .msg-modal-close:hover {
            color: var(--primary-color);
        }

        .msg-header-group {
            margin-bottom: 1.8rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 1.2rem;
        }

        .msg-sender-name {
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0 0 0.4rem 0;
            color: #ffffff;
        }

        .msg-sender-meta {
            font-size: 0.84rem;
            color: rgba(255, 255, 255, 0.4);
            display: flex;
            gap: 1rem;
        }

        .msg-sender-meta a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .msg-subject-label {
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.3rem;
            display: block;
        }

        .msg-subject-val {
            font-size: 1.05rem;
            font-weight: 600;
            color: #ffffff;
            margin: 0;
        }

        .msg-body-box {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.6;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 12px;
            padding: 1.5rem;
            max-height: 250px;
            overflow-y: auto;
            white-space: pre-wrap;
        }

        .unread-badge {
            background-color: var(--primary-color);
            color: #080a0e;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.15rem 0.45rem;
            border-radius: 20px;
            margin-left: auto;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.8rem;
        }

        .action-btn {
            padding: 0.45rem 0.9rem;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            box-sizing: border-box;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .action-btn.edit {
            background: transparent;
            border: 1px solid rgba(249, 199, 0, 0.3);
            color: var(--primary-color);
        }

        .action-btn.edit:hover {
            background: var(--primary-color);
            color: #080a0e;
            border-color: var(--primary-color);
        }

        .action-btn.delete {
            background: transparent;
            border: 1px solid rgba(255, 62, 108, 0.3);
            color: #ff3e6c;
        }

        .action-btn.delete:hover {
            background: #ff3e6c;
            color: #ffffff;
            border-color: #ff3e6c;
        }

        .alert-success {
            background: rgba(179, 245, 0, 0.06);
            border: 1px solid rgba(179, 245, 0, 0.2);
            color: #b3f500;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .alert-success svg {
            flex-shrink: 0;
        }
    </style>
</head>
<body>

    @php
        $unreadCount = \App\Models\Contact::where('is_read', false)->count();
    @endphp

    <div class="dashboard-layout">
        @include('admin.layouts.sidebar')

        <!-- Main Workspace -->
        <main class="workspace">
            <div class="workspace-header">
                <div class="workspace-title">
                    <h1>Inquiries Console</h1>
                    <p>Read and manage messages received from your portfolio's contact form.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Inquiries Container -->
            <div class="content-card">
                <div class="table-responsive">
                    <table class="messages-table">
                        <thead>
                            <tr>
                                <th style="width: 60px; text-align: center;">Status</th>
                                <th>From</th>
                                <th>Interested In</th>
                                <th>Message Snippet</th>
                                <th>Received Date</th>
                                <th style="width: 150px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                                <tr class="message-row" data-id="{{ $msg->id }}" data-name="{{ $msg->name }}" data-email="{{ $msg->email }}" data-subject="{{ ucfirst($msg->subject) }}" data-message="{{ $msg->message }}" data-date="{{ $msg->created_at->format('M d, Y - h:i A') }}" data-read-url="{{ route('admin.messages.toggle_read', $msg->id) }}">
                                    <td style="text-align: center;">
                                        <span class="status-badge {{ $msg->is_read ? 'read' : 'unread' }}">
                                            {{ $msg->is_read ? 'Read' : 'New' }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong>{{ $msg->name }}</strong>
                                        <div style="font-size: 0.75rem; color: rgba(255,255,255,0.4); margin-top: 0.2rem;">{{ $msg->email }}</div>
                                    </td>
                                    <td>
                                        <span class="status-badge read" style="font-weight: 600; text-transform: uppercase;">
                                            {{ $msg->subject }}
                                        </span>
                                    </td>
                                    <td>
                                        <div style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 0.84rem; color: rgba(255,255,255,0.5);">
                                            {{ $msg->message }}
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-size: 0.8rem; color: rgba(255,255,255,0.5);">
                                            {{ $msg->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="action-buttons" style="justify-content: center;">
                                            <!-- Open Message Detail Button -->
                                            <button type="button" class="action-btn edit open-msg-btn" title="View Message">
                                                <span>View</span>
                                            </button>
                                            
                                            <!-- Toggle Read Action -->
                                            <form action="{{ route('admin.messages.toggle_read', $msg->id) }}" method="POST" style="margin: 0;">
                                                @csrf
                                                <button type="submit" class="action-btn" style="background: transparent; border: 1px solid rgba(255, 255, 255, 0.15); color: rgba(255, 255, 255, 0.6);" title="Mark {{ $msg->is_read ? 'Unread' : 'Read' }}">
                                                    {{ $msg->is_read ? 'Unread' : 'Read' }}
                                                </button>
                                            </form>

                                            <!-- Delete Action -->
                                            <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');" style="margin: 0;">
                                                @csrf
                                                <button type="submit" class="action-btn delete" title="Delete">
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 3rem 0; color: rgba(255, 255, 255, 0.3);">
                                        <img src="https://img.icons8.com/color/96/chat.png" alt="No Messages" style="width: 64px; height: 64px; opacity: 0.2; margin-bottom: 1rem;"><br>
                                        No messages found. Your contact inquiries will appear here.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Message Detail Modal Lightbox -->
    <div id="message-modal" class="message-modal">
        <div class="msg-modal-content">
            <button class="msg-modal-close" id="msg-modal-close">&times;</button>
            <div class="msg-header-group">
                <span class="msg-subject-label" id="modal-subject-label">Subject</span>
                <h3 class="msg-sender-name" id="modal-sender-name">Sender Name</h3>
                <div class="msg-sender-meta">
                    <span id="modal-sender-email">sender@email.com</span>
                    <span style="color: rgba(255,255,255,0.15)">|</span>
                    <span id="modal-sender-date">Date</span>
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label style="font-size: 0.72rem; color: rgba(255,255,255,0.4); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Message Details</label>
                <div class="msg-body-box" id="modal-body-box">
                    Message body text goes here...
                </div>
            </div>

            <div style="display: flex; gap: 0.8rem; margin-top: 2rem; justify-content: flex-end;">
                <button type="button" class="btn-login-subtle" id="modal-close-action-btn" style="padding: 0.8rem 1.6rem; border-radius: 10px; font-weight: 600; font-size: 0.88rem;">Close</button>
                <form id="modal-read-form" action="" method="POST">
                    @csrf
                    <button type="submit" class="contact-submit-btn" id="modal-read-btn" style="padding: 0.8rem 1.6rem; border-radius: 10px; font-weight: 600; font-size: 0.88rem;">
                        Mark Read
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('message-modal');
            const closeBtn = document.getElementById('msg-modal-close');
            const closeActionBtn = document.getElementById('modal-close-action-btn');
            const openButtons = document.querySelectorAll('.open-msg-btn');

            const mSubject = document.getElementById('modal-subject-label');
            const mName = document.getElementById('modal-sender-name');
            const mEmail = document.getElementById('modal-sender-email');
            const mDate = document.getElementById('modal-sender-date');
            const mBody = document.getElementById('modal-body-box');
            const mReadForm = document.getElementById('modal-read-form');
            const mReadBtn = document.getElementById('modal-read-btn');

            openButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const row = btn.closest('.message-row');
                    const id = row.getAttribute('data-id');
                    const name = row.getAttribute('data-name');
                    const email = row.getAttribute('data-email');
                    const subject = row.getAttribute('data-subject');
                    const message = row.getAttribute('data-message');
                    const date = row.getAttribute('data-date');
                    const readUrl = row.getAttribute('data-read-url');

                    // Set modal text content
                    mSubject.textContent = subject;
                    mName.textContent = name;
                    mEmail.innerHTML = `<a href="mailto:${email}">${email}</a>`;
                    mDate.textContent = date;
                    mBody.textContent = message;

                    // Configure Read Submit form action URL
                    mReadForm.action = readUrl;

                    // If row contains unread status badge, make sure the button says "Mark Read"
                    const badge = row.querySelector('.status-badge');
                    if (badge && badge.classList.contains('unread')) {
                        mReadBtn.textContent = 'Mark Read';
                        mReadForm.style.display = 'block';
                    } else {
                        mReadBtn.textContent = 'Mark Unread';
                        mReadForm.style.display = 'block'; // toggle read/unread is available anyway
                    }

                    // Open modal
                    modal.classList.add('active');
                });
            });

            const closeModal = () => {
                modal.classList.remove('active');
            };

            closeBtn.addEventListener('click', closeModal);
            closeActionBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>
