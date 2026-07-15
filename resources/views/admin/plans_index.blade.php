<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Plans Manager | Fame House Admin</title>
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

        /* Table custom styles */
        .plans-table {
            width: 100%;
            border-collapse: collapse;
        }

        .plans-table th {
            padding: 1.1rem 1.5rem;
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            text-align: left;
        }

        .plans-table td {
            padding: 1.2rem 1.5rem;
            font-size: 0.92rem;
            color: rgba(255, 255, 255, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            vertical-align: middle;
        }

        .plans-table tr:hover td {
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

        .status-badge.popular {
            background: rgba(249, 199, 0, 0.1);
            color: var(--primary-color);
            border: 1px solid rgba(249, 199, 0, 0.2);
        }

        .status-badge.regular {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .features-pill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            max-width: 350px;
        }

        .feature-pill {
            font-size: 0.75rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 50px;
            padding: 0.15rem 0.6rem;
            color: rgba(255, 255, 255, 0.6);
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
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <a href="{{ route('home') }}" class="logo-link" style="margin-bottom: 3.5rem;">
                <div class="logo-wrapper">
                    <img src="{{ asset('images/final short form logo.png') }}" alt="Logo" class="nav-logo" style="height: 38px;">
                    <div class="logo-expand-container">
                        <img src="{{ asset('images/FAMEHOUSE psd copy.png') }}" alt="Hover Logo" class="nav-logo-hover" style="height: 76px;">
                    </div>
                </div>
            </a>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <img src="https://img.icons8.com/color/48/briefcase.png" alt="Portfolio" style="width: 20px; height: 20px;">
                        <span>Portfolio Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="menu-link">
                        <img src="https://img.icons8.com/color/48/category.png" alt="Categories" style="width: 20px; height: 20px;">
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.messages.index') }}" class="menu-link">
                        <img src="https://img.icons8.com/color/48/chat.png" alt="Messages" style="width: 20px; height: 20px;">
                        <span>Messages</span>
                        @if($unreadCount > 0)
                            <span class="unread-badge">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.plans.index') }}" class="menu-link active">
                        <img src="https://img.icons8.com/color/48/coins.png" alt="Plans" style="width: 20px; height: 20px;">
                        <span>Pricing Plans</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="menu-link" target="_blank">
                        <img src="https://img.icons8.com/color/48/external-link.png" alt="Live Site" style="width: 20px; height: 20px;">
                        <span>View Live Site</span>
                    </a>
                </li>
            </ul>

            <div class="logout-btn-wrapper">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="sidebar-logout-btn">
                        <img src="https://img.icons8.com/color/48/shutdown.png" alt="Logout" style="width: 18px; height: 18px;">
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="workspace">
            <div class="workspace-header">
                <div class="workspace-title">
                    <h1>Pricing Plans Management</h1>
                    <p>Manage, add, edit, and arrange the packages displayed in your homepage pricing grid.</p>
                </div>
                <a href="{{ route('admin.plans.create') }}" class="contact-submit-btn" style="text-decoration: none; padding: 0.8rem 1.6rem; border-radius: 10px; font-weight: 600; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 0.5rem; border: none;">
                    <span>Add New Plan</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Plans Table Card -->
            <div class="content-card">
                <div class="table-responsive">
                    <table class="plans-table">
                        <thead>
                            <tr>
                                <th style="width: 80px; text-align: center;">Order</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Features</th>
                                <th style="width: 120px; text-align: center;">Popularity</th>
                                <th style="width: 150px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plans as $plan)
                                <tr>
                                    <td style="text-align: center; font-weight: 700; color: var(--primary-color);">
                                        {{ $plan->order }}
                                    </td>
                                    <td>
                                        <strong>{{ $plan->name }}</strong>
                                    </td>
                                    <td>
                                        <span style="font-weight: 700; color: #ffffff;">₹{{ $plan->price }}</span><span style="font-size: 0.8rem; color: rgba(255,255,255,0.4)">{{ $plan->duration }}</span>
                                    </td>
                                    <td>
                                        <div class="features-pill-list">
                                            @foreach($plan->features ?? [] as $feature)
                                                <span class="feature-pill">{{ $feature }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <span class="status-badge {{ $plan->is_popular ? 'popular' : 'regular' }}">
                                            {{ $plan->is_popular ? 'Popular' : 'Regular' }}
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="action-buttons" style="justify-content: center;">
                                            <a href="{{ route('admin.plans.edit', $plan->id) }}" class="action-btn edit">Edit</a>
                                            <form action="{{ route('admin.plans.delete', $plan->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');" style="margin: 0;">
                                                @csrf
                                                <button type="submit" class="action-btn delete">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 4rem 0; color: rgba(255, 255, 255, 0.3);">
                                        <img src="https://img.icons8.com/color/96/coins.png" alt="No Plans" style="width: 64px; height: 64px; opacity: 0.2; margin-bottom: 1rem;"><br>
                                        No pricing plans found. Click "Add New Plan" to set up your packages.
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
