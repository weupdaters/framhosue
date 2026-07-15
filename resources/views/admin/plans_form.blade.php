<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($plan) ? 'Edit Plan' : 'Create Plan' }} | Fame House Admin</title>
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
            padding: 2.5rem;
            box-sizing: border-box;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            max-width: 720px;
        }

        /* Form Design */
        .form-title {
            font-size: 1.3rem;
            font-weight: 800;
            margin-top: 0;
            margin-bottom: 1.8rem;
            letter-spacing: -0.3px;
            color: #ffffff;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1.8rem;
        }

        .form-group label {
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
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

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 20px rgba(249, 199, 0, 0.08);
            background: rgba(0, 0, 0, 0.6);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .checkbox-group {
            flex-direction: row;
            align-items: center;
            gap: 0.8rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .checkbox-group label {
            text-transform: none;
            font-weight: 600;
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.85);
            cursor: pointer;
        }

        .error-message {
            color: #ff3e6c;
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 0.2rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            text-decoration: none;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-cancel:hover {
            border-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
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
                    <h1>{{ isset($plan) ? 'Edit Pricing Plan' : 'Create Pricing Plan' }}</h1>
                    <p>{{ isset($plan) ? 'Modify plan settings, pricing, and features.' : 'Configure a new subscription tier for your portfolio.' }}</p>
                </div>
            </div>

            <!-- Form Card -->
            <div class="content-card">
                <form action="{{ isset($plan) ? route('admin.plans.update', $plan->id) : route('admin.plans.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-title">
                        {{ isset($plan) ? 'Plan Configuration' : 'New Plan Settings' }}
                    </div>

                    <!-- Plan Name -->
                    <div class="form-group">
                        <label for="name">Plan Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $plan->name ?? '') }}" placeholder="e.g., PRO-CREATOR" required>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price and Duration -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price (₹)</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $plan->price ?? '') }}" placeholder="e.g., 499" min="0" required>
                            @error('price')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" id="duration" name="duration" value="{{ old('duration', $plan->duration ?? '/mo') }}" placeholder="e.g., /mo" required>
                            @error('duration')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Features Text Area -->
                    <div class="form-group">
                        <label for="features_text">Features List (One feature per line)</label>
                        <textarea id="features_text" name="features_text" rows="6" placeholder="e.g.&#10;15 Reels / Shorts edits&#10;2 YouTube Long-form edits&#10;Advanced color grading" required>{{ old('features_text', $features_text ?? '') }}</textarea>
                        <p style="font-size: 0.72rem; color: rgba(255,255,255,0.4); margin: 0.3rem 0 0 0;">Enter each item/benefit on a new line. Empty lines will be omitted automatically.</p>
                        @error('features_text')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Display Order -->
                    <div class="form-group">
                        <label for="order">Display Order Position</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $plan->order ?? '1') }}" placeholder="e.g. 1 (first), 2, 3" required>
                        <p style="font-size: 0.72rem; color: rgba(255,255,255,0.4); margin: 0.3rem 0 0 0;">Determines the card's position in the grid (lower numbers display first).</p>
                        @error('order')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Popular Toggle Option -->
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular', isset($plan) && $plan->is_popular) ? 'checked' : '' }}>
                        <label for="is_popular">Highlight as "Most Popular" Plan</label>
                    </div>

                    <!-- Submit / Cancel -->
                    <div class="form-actions">
                        <button type="submit" class="contact-submit-btn" style="border: none; padding: 1rem 2.2rem; border-radius: 12px; font-weight: 700; font-size: 0.9rem;">
                            {{ isset($plan) ? 'Update Pricing Plan' : 'Create Pricing Plan' }}
                        </button>
                        <a href="{{ route('admin.plans.index') }}" class="btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
