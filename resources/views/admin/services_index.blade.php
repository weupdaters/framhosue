<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Manager | Fame House Admin</title>
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
            background: rgba(184, 255, 52, 0.08);
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
            background: radial-gradient(circle at top right, rgba(184, 255, 52, 0.02) 0%, transparent 60%);
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

        /* Table custom styles */
        .services-table {
            width: 100%;
            border-collapse: collapse;
        }

        .services-table th {
            padding: 1.1rem 1.5rem;
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            text-align: left;
        }

        .services-table td {
            padding: 1.2rem 1.5rem;
            font-size: 0.92rem;
            color: rgba(255, 255, 255, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            vertical-align: middle;
        }

        .services-table tr:hover td {
            background: rgba(255, 255, 255, 0.01);
        }

        .service-thumb {
            width: 70px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            border: 1px solid rgba(184, 255, 52, 0.3);
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

        .unread-badge {
            background-color: var(--primary-color);
            color: #080a0e;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.15rem 0.45rem;
            border-radius: 20px;
            margin-left: auto;
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
                    <h1>Services Management</h1>
                    <p>Manage, add, edit, and arrange the capabilities showcased on your homepage.</p>
                </div>
                <a href="{{ route('admin.services.create') }}" class="contact-submit-btn" style="text-decoration: none; padding: 0.8rem 1.6rem; border-radius: 10px; font-weight: 600; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 0.5rem; border: none;">
                    <span>Add New Service</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Services Table Card -->
            <div class="content-card">
                <div class="table-responsive">
                    <table class="services-table">
                        <thead>
                            <tr>
                                <th style="width: 80px; text-align: center;">Order</th>
                                <th style="width: 100px;">Thumbnail</th>
                                <th>Service Code</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Video ID / URL</th>
                                <th style="width: 150px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td style="text-align: center; font-weight: 700; color: var(--primary-color);">
                                        {{ $service->order }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/' . $service->image_path) }}" alt="{{ $service->title }}" class="service-thumb">
                                    </td>
                                    <td style="font-weight: 700;">
                                        {{ $service->service_code }}
                                    </td>
                                    <td>
                                        <strong>{{ $service->title }}</strong>
                                    </td>
                                    <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $service->description }}
                                    </td>
                                    <td>
                                        @if($service->video_id)
                                            <span style="color: var(--primary-color); font-size: 0.85rem;">{{ $service->video_id }}</span>
                                        @else
                                            <span style="color: rgba(255,255,255,0.25); font-size: 0.85rem;">None</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="action-buttons" style="justify-content: center;">
                                            <a href="{{ route('admin.services.edit', $service->id) }}" class="action-btn edit">Edit</a>
                                            <form action="{{ route('admin.services.delete', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');" style="margin: 0;">
                                                @csrf
                                                <button type="submit" class="action-btn delete">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 4rem 0; color: rgba(255, 255, 255, 0.3);">
                                        <img src="https://img.icons8.com/color/96/support.png" alt="No Services" style="width: 64px; height: 64px; opacity: 0.2; margin-bottom: 1rem;"><br>
                                        No services found. Click "Add New Service" to set up your offerings.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
