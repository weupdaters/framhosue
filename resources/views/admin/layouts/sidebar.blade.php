<!-- Sidebar Navigation -->
<aside class="sidebar">
    <a href="{{ route('home') }}" class="logo-link" style="margin-bottom: 3.5rem;">
        <div class="logo-wrapper">
            <img src="{{ asset('images/final short form logo.png') }}" alt="Logo" class="nav-logo" style="height: 38px;">
        </div>
    </a>

    @php
        $unreadCount = \App\Models\Contact::where('is_read', false)->count();
    @endphp
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <img src="https://img.icons8.com/color/48/briefcase.png" alt="Portfolio" style="width: 20px; height: 20px;">
                <span>Portfolio Items</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}" class="menu-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <img src="https://img.icons8.com/color/48/category.png" alt="Categories" style="width: 20px; height: 20px;">
                <span>Categories</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.services.index') }}" class="menu-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <img src="https://img.icons8.com/color/48/support.png" alt="Services" style="width: 20px; height: 20px;">
                <span>Services</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.messages.index') }}" class="menu-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <img src="https://img.icons8.com/color/48/chat.png" alt="Messages" style="width: 20px; height: 20px;">
                <span>Messages</span>
                @if($unreadCount > 0)
                    <span class="unread-badge">{{ $unreadCount }}</span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{ route('admin.plans.index') }}" class="menu-link {{ request()->routeIs('admin.plans.*') ? 'active' : '' }}">
                <img src="https://img.icons8.com/color/48/coins.png" alt="Plans" style="width: 20px; height: 20px;">
                <span>Pricing Plans</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings.index') }}" class="menu-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <img src="https://img.icons8.com/color/48/settings--v1.png" alt="Settings" style="width: 20px; height: 20px;">
                <span>Settings</span>
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
