<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Management | Fame House Portfolio Console</title>
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

        /* Grid Layout for Categories Content */
        .categories-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 2.5rem;
            align-items: start;
        }

        /* Cards & Table */
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

        .categories-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .categories-table th {
            padding: 1.1rem 1.5rem;
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .categories-table td {
            padding: 1.2rem 1.5rem;
            font-size: 0.92rem;
            color: rgba(255, 255, 255, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            vertical-align: middle;
        }

        .categories-table tr:hover td {
            background: rgba(255, 255, 255, 0.01);
        }

        .badge-slug {
            font-family: monospace;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            padding: 0.2rem 0.5rem;
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .count-badge {
            background: rgba(249, 199, 0, 0.05);
            border: 1px solid rgba(249, 199, 0, 0.15);
            color: var(--primary-color);
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.82rem;
        }

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

        /* Form Design */
        .form-title {
            font-size: 1.3rem;
            font-weight: 800;
            margin-top: 0;
            margin-bottom: 1.5rem;
            letter-spacing: -0.3px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-group input[type="text"] {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 1.1rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            color: #ffffff;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-sizing: border-box;
            width: 100%;
        }

        .form-group input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 20px rgba(249, 199, 0, 0.08);
            background: rgba(0, 0, 0, 0.6);
        }

        .error-message {
            color: #ff3e6c;
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 0.3rem;
        }

        .btn-submit {
            background: var(--primary-color);
            color: #080a0e;
            border: 1px solid var(--primary-color);
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(249, 199, 0, 0.25);
        }

        .btn-cancel {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: var(--text-secondary);
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 0.8rem;
            box-sizing: border-box;
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.03);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Success Alert */
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

            @php
                $unreadCount = \App\Models\Contact::where('is_read', false)->count();
            @endphp
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <img src="https://img.icons8.com/color/48/briefcase.png" alt="Portfolio" style="width: 20px; height: 20px;">
                        <span>Portfolio Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="menu-link active">
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
                    <a href="{{ route('admin.plans.index') }}" class="menu-link">
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
                    <h1>Categories Management</h1>
                    <p>Add, edit, or delete portfolio categories to group your works dynamically.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="categories-grid">
                <!-- Categories Table Card -->
                <div class="content-card">
                    <div class="table-responsive">
                        <table class="categories-table">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Slug Identifier</th>
                                    <th style="text-align: center;">Projects</th>
                                    <th style="width: 150px; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $cat)
                                    <tr>
                                        <td>
                                            <strong>{{ $cat->name }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge-slug">{{ $cat->slug }}</span>
                                        </td>
                                        <td style="text-align: center;">
                                            <span class="count-badge">{{ $cat->projects_count }}</span>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="action-btn edit">Edit</a>
                                                <form action="{{ route('admin.categories.delete', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? Projects belonging to it will remain but won\'t be associated to a live category.');">
                                                    @csrf
                                                    <button type="submit" class="action-btn delete">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; padding: 4rem 0; color: rgba(255,255,255,0.3);">
                                            No categories defined. Use the form to add your first category.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Add/Edit Category Card -->
                <div class="content-card">
                    <h2 class="form-title">
                        @if(isset($category))
                            <img src="https://img.icons8.com/color/48/edit--v1.png" alt="Edit" style="width: 22px; height: 22px;">
                            <span>Edit Category</span>
                        @else
                            <img src="https://img.icons8.com/color/48/plus--v1.png" alt="Add" style="width: 22px; height: 22px;">
                            <span>Add New Category</span>
                        @endif
                    </h2>

                    <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
                        @csrf
                        
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" placeholder="e.g. 3D Animation" required>
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="form-group">
                            <label for="slug">Slug Identifier (Optional for Create)</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug ?? '') }}" placeholder="e.g. 3d-animation" {{ isset($category) ? 'required' : '' }}>
                            <span style="font-size: 0.72rem; color: rgba(255,255,255,0.35); margin-top: 0.2rem;">Used in routes and CSS classes. Only alphanumeric and hyphens.</span>
                            @error('slug')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit">
                            <span>Save Category</span>
                        </button>

                        @if(isset($category))
                            <a href="{{ route('admin.categories.index') }}" class="btn-cancel">Cancel Edit</a>
                        @endif
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
