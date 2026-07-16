<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($service) ? 'Edit Service' : 'Create Service' }} | Fame House Admin</title>
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
        .form-group input[type="file"],
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
            box-shadow: 0 0 20px rgba(184, 255, 52, 0.08);
            background: rgba(0, 0, 0, 0.6);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
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

        .preview-img-container {
            margin-top: 0.8rem;
        }

        .preview-img-container img {
            width: 140px;
            height: 90px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
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
                    <h1>{{ isset($service) ? 'Edit Service' : 'Create Service' }}</h1>
                    <p>{{ isset($service) ? 'Modify service attributes, description, or media.' : 'Configure a new core capability for your production portfolio.' }}</p>
                </div>
            </div>

            <!-- Form Card -->
            <div class="content-card">
                <form action="{{ isset($service) ? route('admin.services.update', $service->id) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-title">
                        {{ isset($service) ? 'Service Configuration' : 'New Service Settings' }}
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Service Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $service->title ?? '') }}" placeholder="e.g., Commercial Video Editing" required>
                        @error('title')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Service Code and Display Order -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="service_code">Service Code (Header Badge)</label>
                            <input type="text" id="service_code" name="service_code" value="{{ old('service_code', $service->service_code ?? '') }}" placeholder="e.g., 01 - PROMOS" required>
                            @error('service_code')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Display Position Order</label>
                            <input type="number" id="order" name="order" value="{{ old('order', $service->order ?? '1') }}" placeholder="e.g. 1 (first), 2, 3" required>
                            @error('order')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5" placeholder="Describe this service package details and benefits..." required>{{ old('description', $service->description ?? '') }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Video ID / URL -->
                    <div class="form-group">
                        <label for="video_id">Reel / Video Link or Google Drive/YouTube ID (Optional)</label>
                        <input type="text" id="video_id" name="video_id" value="{{ old('video_id', $service->video_id ?? '') }}" placeholder="e.g., 18xUMuIQu_PmSJCCqjxI-gNPflPs4Jxg9 or YouTube URL">
                        <p style="font-size: 0.72rem; color: rgba(255,255,255,0.4); margin: 0.3rem 0 0 0;">Enter Google Drive video ID or YouTube URL to enable video overlay playback on homepage card.</p>
                        @error('video_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Thumbnail Image Upload -->
                    <div class="form-group">
                        <label for="image">Thumbnail / Background Image</label>
                        <input type="file" id="image" name="image" {{ isset($service) ? '' : 'required' }}>
                        <p style="font-size: 0.72rem; color: rgba(255,255,255,0.4); margin: 0.3rem 0 0 0;">Upload a premium cover image for the service card (dimensions like 600x400px recommended).</p>
                        @if(isset($service) && $service->image_path)
                            <div class="preview-img-container">
                                <p style="font-size: 0.78rem; margin-bottom: 0.4rem; color: rgba(255,255,255,0.5);">Current Image:</p>
                                <img src="{{ asset('images/' . $service->image_path) }}" alt="{{ $service->title }}">
                            </div>
                        @endif
                        @error('image')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit / Cancel -->
                    <div class="form-actions">
                        <button type="submit" class="contact-submit-btn" style="border: none; padding: 1rem 2.2rem; border-radius: 12px; font-weight: 700; font-size: 0.9rem;">
                            {{ isset($service) ? 'Update Service' : 'Create Service' }}
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
