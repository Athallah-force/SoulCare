@extends('layouts.app')

@section('content')
<div class="dashboard-layout">
    {{-- Sidebar Navigation --}}
    <div class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="user-profile">
                <div class="avatar-sidebar">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div class="user-info">
                    <h4 class="user-name">{{ $user->name }}</h4>
                    <span class="user-role">Admin</span>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="#overview" class="nav-link" data-section="overview">
                        <span class="nav-icon">📊</span>
                        <span class="nav-text">Overview</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#clients" class="nav-link" data-section="clients">
                        <span class="nav-icon">👥</span>
                        <span class="nav-text">Kelola Klien</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#professionals" class="nav-link" data-section="professionals">
                        <span class="nav-icon">👨‍⚕️</span>
                        <span class="nav-text">Kelola Profesional</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#verification" class="nav-link" data-section="verification">
                        <span class="nav-icon">✅</span>
                        <span class="nav-text">Verifikasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#sessions" class="nav-link" data-section="sessions">
                        <span class="nav-icon">💼</span>
                        <span class="nav-text">Sesi Konsultasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#reports" class="nav-link" data-section="reports">
                        <span class="nav-icon">📈</span>
                        <span class="nav-text">Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" class="nav-link" data-section="settings">
                        <span class="nav-icon">⚙️</span>
                        <span class="nav-text">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer">
            <button class="btn-logout">
                <span class="nav-icon">🚪</span>
                <span class="nav-text">Keluar</span>
            </button>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="dashboard-main">
        {{-- Overview Section --}}
        <section id="overview" class="dashboard-section active">
            <div class="section-header">
                <h1 class="section-title">Admin Dashboard</h1>
                <p class="section-subtitle">Kelola sistem SoulCare secara menyeluruh</p>
            </div>

            {{-- Stats Cards --}}
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon clients">👥</div>
                    <div class="stat-content">
                        <h3 class="stat-number">{{ $totalClients }}</h3>
                        <p class="stat-label">Total Klien</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon professionals">👨‍⚕️</div>
                    <div class="stat-content">
                        <h3 class="stat-number">{{ $totalProfessionals }}</h3>
                        <p class="stat-label">Total Profesional</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon verification">✅</div>
                    <div class="stat-content">
                        <h3 class="stat-number">{{ $totalPendingVerification ?? 0 }}</h3>
                        <p class="stat-label">Pending Verifikasi</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon sessions">💼</div>
                    <div class="stat-content">
                        <h3 class="stat-number">156</h3>
                        <p class="stat-label">Sesi Bulan Ini</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon revenue">💰</div>
                    <div class="stat-content">
                        <h3 class="stat-number">Rp 28,5Jt</h3>
                        <p class="stat-label">Pendapatan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon rating">⭐</div>
                    <div class="stat-content">
                        <h3 class="stat-number">4.7</h3>
                        <p class="stat-label">Rating Rata-rata</p>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="quick-actions">
                <h3 class="actions-title">Aksi Cepat</h3>
                <div class="actions-grid">
                    <button class="action-card" data-section="clients">
                        <div class="action-icon">👥</div>
                        <span class="action-text">Kelola Klien</span>
                    </button>
                    <button class="action-card" data-section="professionals">
                        <div class="action-icon">👨‍⚕️</div>
                        <span class="action-text">Kelola Profesional</span>
                    </button>
                    <button class="action-card" data-section="verification">
                        <div class="action-icon">✅</div>
                        <span class="action-text">Verifikasi</span>
                    </button>
                    <button class="action-card" data-section="reports">
                        <div class="action-icon">📊</div>
                        <span class="action-text">Laporan</span>
                    </button>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="dashboard-card">
                <div class="card-header">
                    <h3 class="card-title">Aktivitas Terbaru</h3>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">🆕</div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Profesional baru</strong> mendaftar: Dr. Sari Dewi</p>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">✅</div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Verifikasi berhasil</strong> untuk Dr. Budi Santoso</p>
                                <span class="activity-time">5 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">💼</div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Sesi konsultasi</strong> selesai: Andi Wijaya & Dr. Lisa</p>
                                <span class="activity-time">1 hari yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">⭐</div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Review baru</strong> 5 bintang dari Siti Nurhaliza</p>
                                <span class="activity-time">1 hari yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Clients Section --}}
        <section id="clients" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Kelola Klien</h1>
                <p class="section-subtitle">Kelola data dan aktivitas klien</p>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-header-content">
                        <h3 class="card-title">Daftar Klien</h3>
                        <div class="header-actions">
                            <button class="btn-secondary small">Ekspor Data</button>
                            <button class="btn-primary small">+ Tambah Klien</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Status</th>
                                    <th>Sesi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="user-cell">
                                        <div class="user-mini">
                                            <div class="mini-avatar client">A</div>
                                            <span>Andi Wijaya</span>
                                        </div>
                                    </td>
                                    <td>andi@email.com</td>
                                    <td>15 Mar 2024</td>
                                    <td><span class="status-badge active">Aktif</span></td>
                                    <td>12</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-secondary small">Detail</button>
                                            <button class="btn-warning small">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="user-cell">
                                        <div class="user-mini">
                                            <div class="mini-avatar client">S</div>
                                            <span>Siti Nurhaliza</span>
                                        </div>
                                    </td>
                                    <td>siti@email.com</td>
                                    <td>20 Mar 2024</td>
                                    <td><span class="status-badge active">Aktif</span></td>
                                    <td>8</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-secondary small">Detail</button>
                                            <button class="btn-warning small">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        {{-- Professionals Section --}}
        <section id="professionals" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Kelola Profesional</h1>
                <p class="section-subtitle">Kelola data dan verifikasi profesional</p>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-header-content">
                        <h3 class="card-title">Daftar Profesional</h3>
                        <div class="header-actions">
                            <button class="btn-secondary small">Ekspor Data</button>
                            <button class="btn-primary small">+ Tambah Profesional</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Spesialisasi</th>
                                    <th>Lisensi</th>
                                    <th>Status</th>
                                    <th>Rating</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="user-cell">
                                        <div class="user-mini">
                                            <div class="mini-avatar professional">D</div>
                                            <span>Dr. Budi Santoso</span>
                                        </div>
                                    </td>
                                    <td>Psikologi Klinis</td>
                                    <td>SIKP-12345</td>
                                    <td><span class="status-badge active">Aktif</span></td>
                                    <td>⭐ 4.8</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-secondary small">Detail</button>
                                            <button class="btn-warning small">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="user-cell">
                                        <div class="user-mini">
                                            <div class="mini-avatar professional">L</div>
                                            <span>Dr. Lisa Andriani</span>
                                        </div>
                                    </td>
                                    <td>Konseling Keluarga</td>
                                    <td>SIKP-67890</td>
                                    <td><span class="status-badge active">Aktif</span></td>
                                    <td>⭐ 4.9</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-secondary small">Detail</button>
                                            <button class="btn-warning small">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        {{-- Verification Section --}}
        <section id="verification" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Verifikasi Profesional</h1>
                <p class="section-subtitle">Verifikasi dan validasi data profesional</p>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <h3 class="card-title">Pending Verifikasi</h3>
                </div>
                <div class="card-body">
                    @if(($totalPendingVerification ?? 0) > 0)
                        <div class="verification-list">
                            <div class="verification-item">
                                <div class="verification-content">
                                    <div class="user-mini">
                                        <div class="mini-avatar professional">S</div>
                                        <div class="user-details">
                                            <h4>Dr. Sari Dewi</h4>
                                            <p>Spesialisasi: Psikologi Anak • Lisensi: SIKP-54321</p>
                                            <span class="verification-date">Diajukan: 25 Mar 2024</span>
                                        </div>
                                    </div>
                                    <div class="verification-actions">
                                        <button class="btn-primary small">Setujui</button>
                                        <button class="btn-warning small">Tolak</button>
                                        <button class="btn-secondary small">Lihat Dokumen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">✅</div>
                            <h3>Tidak ada verifikasi tertunda</h3>
                            <p>Semua profesional telah terverifikasi</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Sessions Section --}}
        <section id="sessions" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Sesi Konsultasi</h1>
                <p class="section-subtitle">Pantau dan kelola sesi konsultasi</p>
            </div>

            <div class="empty-state">
                <div class="empty-icon">💼</div>
                <h3>Fitur Sesi Segera Hadir</h3>
                <p>Kami sedang mengembangkan fitur manajemen sesi untuk admin</p>
            </div>
        </section>

        {{-- Reports Section --}}
        <section id="reports" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Laporan & Analitik</h1>
                <p class="section-subtitle">Analisis data dan kinerja sistem</p>
            </div>

            <div class="empty-state">
                <div class="empty-icon">📊</div>
                <h3>Fitur Laporan Segera Hadir</h3>
                <p>Kami sedang mengembangkan fitur laporan yang komprehensif</p>
            </div>
        </section>

        {{-- Settings Section --}}
        <section id="settings" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Pengaturan Sistem</h1>
                <p class="section-subtitle">Konfigurasi pengaturan aplikasi</p>
            </div>

            <div class="empty-state">
                <div class="empty-icon">⚙️</div>
                <h3>Fitur Pengaturan Segera Hadir</h3>
                <p>Kami sedang mengembangkan panel pengaturan untuk admin</p>
            </div>
        </section>
    </div>
</div>

<style>
    .dashboard-layout {
        display: flex;
        min-height: 100vh;
        background: #f8fafc;
    }

    /* Sidebar Styles */
    .dashboard-sidebar {
        width: 280px;
        background: white;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100vh;
        z-index: 1000;
    }

    .sidebar-header {
        padding: 30px 20px;
        border-bottom: 1px solid #e1e5e9;
        background: linear-gradient(135deg, rgba(167, 233, 175, 0.1) 0%, rgba(138, 180, 248, 0.1) 100%);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .avatar-sidebar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #A7E9AF 0%, #8AB4F8 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: 600;
        color: white;
        box-shadow: 0 4px 15px rgba(138, 180, 248, 0.3);
    }

    .user-info {
        flex: 1;
    }

    .user-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin: 0 0 4px 0;
    }

    .user-role {
        font-size: 0.85rem;
        color: #8AB4F8;
        font-weight: 500;
        background: rgba(138, 180, 248, 0.1);
        padding: 4px 8px;
        border-radius: 12px;
    }

    .sidebar-nav {
        flex: 1;
        padding: 20px 0;
    }

    .nav-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-item {
        margin-bottom: 5px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 20px;
        text-decoration: none;
        color: #666;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }

    .nav-link:hover {
        background: rgba(138, 180, 248, 0.05);
        color: #8AB4F8;
    }

    .nav-item.active .nav-link {
        background: rgba(138, 180, 248, 0.1);
        color: #8AB4F8;
        border-left-color: #8AB4F8;
    }

    .nav-icon {
        font-size: 1.2rem;
        width: 24px;
        text-align: center;
    }

    .nav-text {
        font-weight: 500;
        font-size: 0.95rem;
    }

    .sidebar-footer {
        padding: 20px;
        border-top: 1px solid #e1e5e9;
    }

    .btn-logout {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        background: rgba(255, 107, 107, 0.1);
        color: #ff6b6b;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .btn-logout:hover {
        background: rgba(255, 107, 107, 0.2);
    }

    /* Main Content Styles */
    .dashboard-main {
        flex: 1;
        margin-left: 280px;
        padding: 30px;
    }

    .dashboard-section {
        display: none;
    }

    .dashboard-section.active {
        display: block;
    }

    .section-header {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #A7E9AF 0%, #8AB4F8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #666;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        gap: 15px;
        border: 1px solid rgba(138, 180, 248, 0.1);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        font-size: 2.5rem;
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-icon.clients {
        background: rgba(138, 180, 248, 0.1);
        color: #8AB4F8;
    }

    .stat-icon.professionals {
        background: rgba(167, 233, 175, 0.1);
        color: #A7E9AF;
    }

    .stat-icon.verification {
        background: rgba(255, 193, 7, 0.1);
        color: #FFC107;
    }

    .stat-icon.sessions {
        background: rgba(156, 39, 176, 0.1);
        color: #9C27B0;
    }

    .stat-icon.revenue {
        background: rgba(76, 175, 80, 0.1);
        color: #4CAF50;
    }

    .stat-icon.rating {
        background: rgba(255, 152, 0, 0.1);
        color: #FF9800;
    }

    .stat-content {
        flex: 1;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        margin: 0;
        line-height: 1;
    }

    .stat-label {
        color: #666;
        margin: 5px 0 0 0;
        font-size: 0.9rem;
    }

    /* Quick Actions */
    .quick-actions {
        margin-bottom: 40px;
    }

    .actions-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
    }

    .action-card {
        background: white;
        padding: 25px 20px;
        border-radius: 12px;
        border: 2px solid rgba(138, 180, 248, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .action-card:hover {
        border-color: #8AB4F8;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(138, 180, 248, 0.15);
    }

    .action-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .action-text {
        font-weight: 500;
        color: #333;
        font-size: 0.9rem;
    }

    /* Activity List */
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 15px;
        border-radius: 10px;
        background: rgba(138, 180, 248, 0.05);
        transition: background 0.3s ease;
    }

    .activity-item:hover {
        background: rgba(138, 180, 248, 0.1);
    }

    .activity-icon {
        font-size: 1.2rem;
        margin-top: 2px;
    }

    .activity-content {
        flex: 1;
    }

    .activity-text {
        margin: 0 0 5px 0;
        color: #333;
        font-size: 0.95rem;
    }

    .activity-time {
        font-size: 0.8rem;
        color: #666;
    }

    /* Dashboard Card */
    .dashboard-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        border: 1px solid rgba(138, 180, 248, 0.1);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, rgba(167, 233, 175, 0.1) 0%, rgba(138, 180, 248, 0.1) 100%);
        padding: 20px 30px;
        border-bottom: 1px solid rgba(138, 180, 248, 0.2);
    }

    .card-header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-actions {
        display: flex;
        gap: 10px;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .card-body {
        padding: 30px;
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background: linear-gradient(135deg, rgba(167, 233, 175, 0.1) 0%, rgba(138, 180, 248, 0.1) 100%);
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        color: #333;
        border-bottom: 1px solid rgba(138, 180, 248, 0.2);
    }

    .data-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
    }

    .data-table tr:hover {
        background: rgba(138, 180, 248, 0.02);
    }

    .user-cell {
        white-space: nowrap;
    }

    .user-mini {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .mini-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        font-weight: 600;
        color: white;
    }

    .mini-avatar.client {
        background: linear-gradient(135deg, #A7E9AF 0%, #8AB4F8 100%);
    }

    .mini-avatar.professional {
        background: linear-gradient(135deg, #FFB74D 0%, #FF9800 100%);
    }

    .user-details h4 {
        margin: 0 0 5px 0;
        color: #333;
    }

    .user-details p {
        margin: 0;
        color: #666;
        font-size: 0.9rem;
    }

    .verification-date {
        font-size: 0.8rem;
        color: #999;
    }

    /* Status Badge */
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-badge.active {
        background: rgba(167, 233, 175, 0.2);
        color: #2e7d32;
        border: 1px solid rgba(167, 233, 175, 0.4);
    }

    .status-badge.inactive {
        background: rgba(255, 107, 107, 0.2);
        color: #c62828;
        border: 1px solid rgba(255, 107, 107, 0.4);
    }

    /* Buttons */
    .btn-primary, .btn-secondary, .btn-warning {
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #A7E9AF 0%, #8AB4F8 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(138, 180, 248, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(138, 180, 248, 0.4);
    }

    .btn-secondary {
        background: rgba(138, 180, 248, 0.1);
        color: #8AB4F8;
        border: 1px solid rgba(138, 180, 248, 0.3);
    }

    .btn-secondary:hover {
        background: rgba(138, 180, 248, 0.2);
        transform: translateY(-2px);
    }

    .btn-warning {
        background: rgba(255, 152, 0, 0.1);
        color: #f57c00;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .btn-warning:hover {
        background: rgba(255, 152, 0, 0.2);
        transform: translateY(-2px);
    }

    .btn-primary.small, .btn-secondary.small, .btn-warning.small {
        padding: 8px 16px;
        font-size: 0.8rem;
    }

    /* Verification List */
    .verification-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .verification-item {
        padding: 20px;
        border: 2px solid rgba(255, 193, 7, 0.2);
        border-radius: 12px;
        background: rgba(255, 193, 7, 0.05);
    }

    .verification-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .verification-actions {
        display: flex;
        gap: 10px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 50px 30px;
        color: #666;
    }

    .empty-icon {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: #333;
        margin-bottom: 10px;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    @media (max-width: 768px) {
        .dashboard-layout {
            flex-direction: column;
        }

        .dashboard-sidebar {
            position: relative;
            width: 100%;
            height: auto;
        }

        .dashboard-main {
            margin-left: 0;
            padding: 20px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .actions-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .card-header-content {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .header-actions {
            justify-content: center;
        }

        .verification-content {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .verification-actions {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Navigation functionality
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('.dashboard-section');
        const actionCards = document.querySelectorAll('.action-card');

        // Function to show section
        function showSection(sectionId) {
            // Hide all sections
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Remove active class from all nav items
            navLinks.forEach(link => {
                link.parentElement.classList.remove('active');
            });

            // Show target section
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
            }

            // Activate corresponding nav item
            const activeNavLink = document.querySelector(`[data-section="${sectionId}"]`);
            if (activeNavLink) {
                activeNavLink.parentElement.classList.add('active');
            }
        }

        // Add click event to nav links
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute('data-section');
                showSection(sectionId);
            });
        });

        // Add click event to action cards
        actionCards.forEach(card => {
            card.addEventListener('click', function() {
                const sectionId = this.getAttribute('data-section');
                showSection(sectionId);
            });
        });

        // Initialize with overview section
        showSection('overview');
    });
</script>
@endsection