<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') – JMPSS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary: #1a3c6e; --primary-light: #2a5ba0;
            --accent: #f59e0b; --accent-dark: #d97706;
            --sidebar-w: 260px;
            --sidebar-bg: #0f2447;
            --topbar-h: 64px;
            --text: #1e293b; --text-muted: #64748b;
            --bg: #f1f5f9; --card-bg: #ffffff;
            --border: #e2e8f0;
            --success: #10b981; --danger: #ef4444; --warning: #f59e0b; --info: #3b82f6;
        }
        html { scroll-behavior: smooth; }
        body { font-family: 'Outfit', sans-serif; background: var(--bg); color: var(--text); display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w); background: var(--sidebar-bg);
            position: fixed; top: 0; left: 0; bottom: 0; z-index: 100;
            display: flex; flex-direction: column;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 2px; }
        .sidebar-brand { padding: 24px 20px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-brand-icon { width: 44px; height: 44px; background: var(--accent); border-radius: 12px; display: grid; place-items: center; font-size: 20px; font-weight: 800; color: var(--primary); flex-shrink: 0; }
        .sidebar-brand-text strong { display: block; font-size: 17px; font-weight: 800; color: white; }
        .sidebar-brand-text span { font-size: 12px; color: rgba(255,255,255,0.5); }
        .sidebar-section-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: rgba(255,255,255,0.35); padding: 20px 20px 8px; }
        .sidebar-nav { list-style: none; padding: 0 12px; }
        .sidebar-nav li { margin-bottom: 2px; }
        .sidebar-nav a {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 14px; border-radius: 10px;
            text-decoration: none; font-size: 14px; font-weight: 500;
            color: rgba(255,255,255,0.65);
            transition: all 0.2s ease;
        }
        .sidebar-nav a:hover { background: rgba(255,255,255,0.1); color: white; }
        .sidebar-nav a.active { background: var(--accent); color: var(--primary); font-weight: 700; }
        .sidebar-nav a i { width: 18px; text-align: center; font-size: 15px; }
        .sidebar-nav .badge-count { margin-left: auto; background: rgba(255,255,255,0.2); color: white; font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 50px; }
        .sidebar-nav a.active .badge-count { background: rgba(26,60,110,0.3); }
        .sidebar-footer { padding: 16px 12px; border-top: 1px solid rgba(255,255,255,0.1); margin-top: auto; }
        .admin-profile { display: flex; align-items: center; gap: 10px; padding: 12px; border-radius: 10px; background: rgba(255,255,255,0.08); }
        .admin-avatar { width: 36px; height: 36px; border-radius: 10px; background: var(--accent); display: grid; place-items: center; font-weight: 700; color: var(--primary); font-size: 14px; flex-shrink: 0; }
        .admin-info strong { display: block; font-size: 13px; color: white; font-weight: 600; }
        .admin-info span { font-size: 11px; color: rgba(255,255,255,0.5); }

        /* Main */
        .main-wrapper { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        /* Topbar */
        .topbar {
            height: var(--topbar-h); background: white;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 28px; position: sticky; top: 0; z-index: 90;
            box-shadow: 0 1px 8px rgba(0,0,0,0.05);
        }
        .topbar-left { display: flex; align-items: center; gap: 16px; }
        .topbar-left h1 { font-size: 20px; font-weight: 700; color: var(--text); }
        .topbar-breadcrumb { font-size: 13px; color: var(--text-muted); }
        .topbar-right { display: flex; align-items: center; gap: 16px; }
        .topbar-btn { width: 38px; height: 38px; border-radius: 10px; background: var(--bg); border: 1px solid var(--border); display: grid; place-items: center; cursor: pointer; font-size: 16px; color: var(--text-muted); text-decoration: none; transition: all 0.2s; }
        .topbar-btn:hover { background: var(--primary); color: white; border-color: var(--primary); }
        .logout-btn {
            display: flex; align-items: center; gap: 8px;
            padding: 9px 18px; background: #fee2e2; color: #991b1b;
            border-radius: 10px; font-size: 13px; font-weight: 600;
            text-decoration: none; border: 1px solid #fca5a5;
            transition: all 0.2s ease;
        }
        .logout-btn:hover { background: #ef4444; color: white; border-color: #ef4444; }

        /* Content */
        .content { padding: 28px; flex: 1; }
        .page-title { margin-bottom: 28px; }
        .page-title h2 { font-size: 26px; font-weight: 800; color: var(--text); margin-bottom: 4px; }
        .page-title p { color: var(--text-muted); font-size: 14px; }

        /* Cards */
        .card { background: white; border-radius: 16px; border: 1px solid var(--border); box-shadow: 0 1px 8px rgba(0,0,0,0.05); }
        .card-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
        .card-header h3 { font-size: 16px; font-weight: 700; }
        .card-body { padding: 24px; }

        /* Stat Cards */
        .stats-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px; margin-bottom: 28px; }
        .stat-card { background: white; border-radius: 16px; padding: 24px; border: 1px solid var(--border); box-shadow: 0 1px 8px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 12px; transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: grid; place-items: center; font-size: 22px; }
        .stat-value { font-size: 2rem; font-weight: 800; color: var(--text); }
        .stat-label { font-size: 13px; color: var(--text-muted); font-weight: 500; }
        .stat-change { font-size: 12px; font-weight: 600; display: flex; align-items: center; gap: 4px; }
        .stat-change.up { color: var(--success); }

        /* Tables */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        thead th { background: #f8fafc; padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); border-bottom: 1px solid var(--border); }
        tbody td { padding: 14px 16px; border-bottom: 1px solid var(--border); font-size: 14px; vertical-align: middle; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f8fafc; }

        /* Badges */
        .badge { display: inline-flex; align-items: center; gap: 4px; padding: 4px 12px; border-radius: 50px; font-size: 12px; font-weight: 700; }
        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
        .badge-info { background: #dbeafe; color: #1e40af; }
        .badge-gray { background: #f1f5f9; color: #475569; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 9px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; text-decoration: none; transition: all 0.2s; font-family: 'Outfit', sans-serif; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-light); }
        .btn-accent { background: var(--accent); color: var(--primary); }
        .btn-accent:hover { background: var(--accent-dark); }
        .btn-success { background: var(--success); color: white; }
        .btn-danger { background: #fee2e2; color: var(--danger); border: 1px solid #fca5a5; }
        .btn-danger:hover { background: var(--danger); color: white; }
        .btn-outline { background: transparent; border: 1px solid var(--border); color: var(--text); }
        .btn-outline:hover { border-color: var(--primary); color: var(--primary); }
        .btn-sm { padding: 6px 14px; font-size: 12px; }

        /* Flash */
        .flash-wrap { position: fixed; top: 80px; right: 24px; z-index: 9999; min-width: 300px; }
        .alert { padding: 14px 18px; border-radius: 12px; margin-bottom: 12px; display: flex; align-items: center; gap: 10px; font-size: 14px; font-weight: 500; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .alert-success { background: white; color: var(--success); border: 1px solid #6ee7b7; }
        .alert-error { background: white; color: var(--danger); border: 1px solid #fca5a5; }

        /* Forms */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-control { width: 100%; padding: 11px 14px; border: 1.5px solid var(--border); border-radius: 10px; font-size: 14px; font-family: 'Outfit', sans-serif; outline: none; transition: border-color 0.2s, box-shadow 0.2s; background: white; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(26,60,110,0.1); }
        .form-text { font-size: 12px; color: var(--text-muted); margin-top: 4px; }
        .error-msg { color: var(--danger); font-size: 12px; margin-top: 4px; }
        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; }

        /* Hamburger */
        .sidebar-toggle { display: none; width: 36px; height: 36px; background: var(--bg); border: 1px solid var(--border); border-radius: 8px; place-items: center; cursor: pointer; font-size: 18px; color: var(--text); }

        @media (max-width: 1200px) { .stats-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (max-width: 900px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .sidebar-toggle { display: grid; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .form-grid-2, .form-grid-3 { grid-template-columns: 1fr; }
        }
        @media (max-width: 640px) { .stats-grid { grid-template-columns: 1fr 1fr; } }
    </style>
    @stack('styles')
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">J</div>
        <div class="sidebar-brand-text">
            <strong>JMPSS Admin</strong>
            <span>School Management</span>
        </div>
    </div>

    <span class="sidebar-section-label">Main</span>
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
        </li>
    </ul>

    <span class="sidebar-section-label">Content</span>
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('admin.home-sections.index') }}" class="{{ request()->routeIs('admin.home-sections.*') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Home Sections
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Gallery
            </a>
        </li>
        <li>
            <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i> Events
            </a>
        </li>
        <li>
            <a href="{{ route('admin.awards.index') }}" class="{{ request()->routeIs('admin.awards.*') ? 'active' : '' }}">
                <i class="fas fa-trophy"></i> Awards
            </a>
        </li>
        <li>
            <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i class="fas fa-comments"></i> Testimonials
            </a>
        </li>
    </ul>

    <span class="sidebar-section-label">Site</span>
    <ul class="sidebar-nav">
        <li><a href="{{ route('home') }}" target="_blank"><i class="fas fa-external-link-alt"></i> View Website</a></li>
    </ul>

    <div class="sidebar-footer">
        <div class="admin-profile">
            <div class="admin-avatar">{{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}</div>
            <div class="admin-info">
                <strong>{{ Auth::guard('admin')->user()->name }}</strong>
                <span>{{ Auth::guard('admin')->user()->role }}</span>
            </div>
        </div>
    </div>
</aside>

<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Topbar -->
    <header class="topbar">
        <div class="topbar-left">
            <button class="sidebar-toggle" onclick="document.getElementById('sidebar').classList.toggle('open')" style="display:none;margin-right:8px;" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
            <div>
                <h1>@yield('page-title', 'Dashboard')</h1>
                <div class="topbar-breadcrumb">@yield('breadcrumb', 'JMPSS Admin')</div>
            </div>
        </div>
        <div class="topbar-right">
            <a href="{{ route('home') }}" class="topbar-btn" target="_blank" title="View Website"><i class="fas fa-eye"></i></a>
            <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </header>

    <!-- Flash Messages -->
    @if(session('success') || session('error'))
    <div class="flash-wrap">
        @if(session('success'))
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-error"><i class="fas fa-times-circle"></i> {{ session('error') }}</div>
        @endif
    </div>
    @endif

    <!-- Content -->
    <main class="content">
        @yield('content')
    </main>
</div>

<script>
// Auto show sidebar toggle on small screens
const sidebarToggle = document.getElementById('toggle-btn');
function checkSize() {
    if (window.innerWidth <= 900) {
        sidebarToggle.style.display = 'grid';
    } else {
        sidebarToggle.style.display = 'none';
        document.getElementById('sidebar').classList.remove('open');
    }
}
checkSize();
window.addEventListener('resize', checkSize);

// Auto-hide flash messages
setTimeout(() => {
    document.querySelectorAll('.flash-wrap .alert').forEach(el => {
        el.style.transition = 'opacity 0.5s';
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 500);
    });
}, 4000);
</script>
@stack('scripts')
</body>
</html>
