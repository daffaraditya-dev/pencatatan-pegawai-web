<style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 260px;
        background: #ffffff;
        border-right: 1px solid #dee2e6;
        overflow-y: auto;
        z-index: 1000;
        transition: width 0.25s ease;
        display: flex;
        flex-direction: column;
    }
    .main-content {
        margin-left: 260px;
        margin-top: 64px;
        padding-top: 0;
        width: calc(100% - 260px);
        transition: margin-left 0.25s ease, width 0.25s ease;
    }
    header {
        position: fixed;
        top: 0;
        left: 260px;
        right: 0;
        height: 64px;
        z-index: 1001;
    }
    body.sidebar-collapsed .sidebar { width: 72px; overflow-x: hidden; }
    body.sidebar-collapsed .main-content { margin-left: 72px; width: calc(100% - 72px); }
    body.sidebar-collapsed header { left: 72px; }
    body.sidebar-collapsed .sidebar-text { display: none; opacity: 0; }
    body.sidebar-collapsed .sidebar-brand span { display: none; }
    body.sidebar-collapsed .sidebar-brand i { font-size: 1.5rem; margin-right: 0; }
    body.sidebar-collapsed .nav-link i { margin-right: 0; font-size: 1.25rem; }
    body.sidebar-collapsed .nav-link { justify-content: center; padding: 0.75rem 0.5rem; }
    body.sidebar-collapsed .nav-link.active { border-left: none; background: #e7f1ff; }
    .nav-item-sidebar .nav-link {
        padding: 0.75rem 1.25rem;
        color: #495057;
        border-left: 3px solid transparent;
        border-radius: 0;
        text-decoration: none;
        display: block;
        align-items: center;
    }
    .nav-item-sidebar .nav-link:hover, .nav-item-sidebar .nav-link:focus {
        background: #f8f9fa;
        color: #0d6efd;
    }
    .nav-item-sidebar .nav-link.active {
        background: #e7f1ff;
        color: #0d6efd;
        border-left-color: #0d6efd;
    }
    .sidebar-brand {
        padding: 0.75rem 1.25rem;
        font-size: 1.1rem;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    @media (max-width: 767.98px) {
        .sidebar { position: static; width: 100%; height: auto; border-right: none; border-bottom: 1px solid #dee2e6; }
        .main-content { margin-left: 0; margin-top: 0; width: 100%; padding-top: 80px; }
        header { position: fixed; top: 0; left: 0; right: 0; width: 100%; z-index: 1001; }
        body.sidebar-collapsed .sidebar { width: 100%; }
        body.sidebar-collapsed .main-content { margin-left: 0; width: 100%; }
        body.sidebar-collapsed header { left: 0; width: 100%; }
        body.sidebar-collapsed .sidebar-text { display: inline; opacity: 1; }
    }
</style>

<nav class="sidebar p-3">
    <div class="sidebar-brand">
        <i class="fas fa-building text-primary"></i>
        <span class="sidebar-text fw-semibold text-dark">Pencatatan Pegawai</span>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item mb-2 nav-item-sidebar">
            <a class="nav-link {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt text-primary"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-2 nav-item-sidebar">
            <a class="nav-link {{ ($active ?? '') === 'pegawai' ? 'active' : '' }}" href="{{ route('pegawai.index') }}">
                <i class="fas fa-users text-secondary"></i>
                <span class="sidebar-text">Daftar Pegawai</span>
            </a>
        </li>
        <li class="nav-item mb-2 nav-item-sidebar">
            <a class="nav-link {{ ($active ?? '') === 'pegawai.create' ? 'active' : '' }}" href="{{ route('pegawai.create') }}">
                <i class="fas fa-user-plus text-success"></i>
                <span class="sidebar-text">Tambah Pegawai</span>
            </a>
        </li>
    </ul>
    <div class="mt-5 small text-muted">
        <span class="d-block fw-semibold sidebar-text">Sistem Kepegawaian</span>
        <span class="d-block sidebar-text">Versi 1.0.0</span>
    </div>
</nav>

<script>
    function toggleSidebar() {
        var collapsed = document.body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('sidebarCollapsed', collapsed);
    }
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            document.body.classList.add('sidebar-collapsed');
        }
    });
</script>
