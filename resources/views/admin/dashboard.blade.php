<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Fame House Portfolio Console</title>
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

        .btn-add-work {
            background: var(--primary-color);
            color: #080a0e;
            border: 1px solid var(--primary-color);
            padding: 0.8rem 1.6rem;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(249, 199, 0, 0.15);
        }

        .btn-add-work:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(249, 199, 0, 0.25);
        }

        .btn-add-work svg {
            stroke-width: 2.5;
        }

        /* Table & Cards container */
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

        .projects-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .projects-table th {
            padding: 1.1rem 1.5rem;
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .projects-table td {
            padding: 1.2rem 1.5rem;
            font-size: 0.92rem;
            color: rgba(255, 255, 255, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            vertical-align: middle;
        }

        .projects-table tr:hover td {
            background: rgba(255, 255, 255, 0.01);
        }

        .thumbnail-wrapper {
            width: 54px;
            height: 54px;
            border-radius: 8px;
            overflow: hidden;
            background: #000;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .thumbnail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge-cat {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            padding: 0.3rem 0.7rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .badge-cat.video {
            color: #55b2ff;
            border-color: rgba(85, 178, 255, 0.2);
            background: rgba(85, 178, 255, 0.05);
        }

        .badge-cat.reels {
            color: #ff3e6c;
            border-color: rgba(255, 62, 108, 0.2);
            background: rgba(255, 62, 108, 0.05);
        }

        .badge-cat.graphics {
            color: #b3f500;
            border-color: rgba(179, 245, 0, 0.2);
            background: rgba(179, 245, 0, 0.05);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }

        .status-dot.active {
            background-color: var(--primary-color);
            box-shadow: 0 0 10px var(--primary-color);
        }

        .status-dot.inactive {
            background-color: rgba(255, 255, 255, 0.2);
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

    <div class="dashboard-layout">
        @include('admin.layouts.sidebar')

        <!-- Main Workspace -->
        <main class="workspace">
            <div class="workspace-header">
                <div class="workspace-title">
                    <h1>Portfolio Items</h1>
                    <p>Manage all visual projects, descriptions, video links, and slider visibility.</p>
                </div>
                <a href="{{ route('admin.projects.create') }}" class="btn-add-work">
                    <img src="https://img.icons8.com/color/48/plus--v1.png" alt="Add" style="width: 18px; height: 18px; margin-right: 2px;">
                    <span>Add New Work</span>
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="content-card">
                <div class="table-responsive">
                    <table class="projects-table">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Preview</th>
                                <th>Project Title</th>
                                <th>Category</th>
                                <th>Featured Slider</th>
                                <th>Vertical Aspect</th>
                                <th style="width: 180px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                                <tr>
                                    <td>
                                        <div class="thumbnail-wrapper">
                                            <img src="{{ asset('images/' . $project->image_path) }}" alt="{{ $project->title }}" class="thumbnail-img">
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $project->title }}</strong>
                                        @if($project->video_id)
                                            <br><small style="color: rgba(255,255,255,0.4)">Video ID: {{ $project->video_id }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge-cat {{ $project->category }}">
                                            {{ $project->categoryDetails->name ?? ucfirst($project->category) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-dot {{ $project->is_featured ? 'active' : 'inactive' }}"></span>
                                        {{ $project->is_featured ? 'Homepage Slider' : 'Archive Only' }}
                                    </td>
                                    <td>
                                        {{ $project->is_vertical_reel ? 'Yes (9:16 Reel)' : 'No (Square/Landscape)' }}
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="action-btn edit">Edit</a>
                                            <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                @csrf
                                                <button type="submit" class="action-btn delete">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 4rem 0; color: rgba(255,255,255,0.3);">
                                        No projects found. Click "Add New Work" to upload your first project.
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
