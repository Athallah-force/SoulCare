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
                    <span class="user-role">Profesional</span>
                    <span class="user-status {{ $professionalProfile && $professionalProfile->status_aktif ? 'active' : 'inactive' }}">
                        {{ $professionalProfile && $professionalProfile->status_aktif ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
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
                    <a href="#profile" class="nav-link" data-section="profile">
                        <span class="nav-icon">👤</span>
                        <span class="nav-text">Profil Saya</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#schedule" class="nav-link" data-section="schedule">
                        <span class="nav-icon">📅</span>
                        <span class="nav-text">Jadwal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#appointments" class="nav-link" data-section="appointments">
                        <span class="nav-icon">👥</span>
                        <span class="nav-text">Janji Temu</span>
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
                    <a href="#earnings" class="nav-link" data-section="earnings">
                        <span class="nav-icon">💰</span>
                        <span class="nav-text">Pendapatan</span>
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
                <h1 class="section-title">Dashboard Overview</h1>
                <p class="section-subtitle">Ringkasan aktivitas dan kinerja Anda</p>
            </div>

            {{-- Stats Cards --}}
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon appointment">📅</div>
                    <div class="stat-content">
                        <h3 class="stat-number">8</h3>
                        <p class="stat-label">Janji Mendatang</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon completed">✅</div>
                    <div class="stat-content">
                        <h3 class="stat-number">24</h3>
                        <p class="stat-label">Sesi Selesai</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon clients">👥</div>
                    <div class="stat-content">
                        <h3 class="stat-number">15</h3>
                        <p class="stat-label">Klien Aktif</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon rating">⭐</div>
                    <div class="stat-content">
                        <h3 class="stat-number">4.8</h3>
                        <p class="stat-label">Rating</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon revenue">💰</div>
                    <div class="stat-content">
                        <h3 class="stat-number">Rp 3,5Jt</h3>
                        <p class="stat-label">Pendapatan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon availability">⏰</div>
                    <div class="stat-content">
                        <h3 class="stat-number">12</h3>
                        <p class="stat-label">Slot Tersedia</p>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="quick-actions">
                <h3 class="actions-title">Aksi Cepat</h3>
                <div class="actions-grid">
                    <button class="action-card" data-section="schedule">
                        <div class="action-icon">➕</div>
                        <span class="action-text">Tambah Jadwal</span>
                    </button>
                    <button class="action-card" data-section="appointments">
                        <div class="action-icon">👁️</div>
                        <span class="action-text">Lihat Janji</span>
                    </button>
                    <button class="action-card" data-section="profile">
                        <div class="action-icon">✏️</div>
                        <span class="action-text">Edit Profil</span>
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
                            <div class="activity-icon">✅</div>
                            <div class="activity-content">
                                <p class="activity-text">Sesi konsultasi dengan <strong>Budi Santoso</strong> selesai</p>
                                <span class="activity-time">2 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">📅</div>
                            <div class="activity-content">
                                <p class="activity-text">Janji temu baru dengan <strong>Sari Dewi</strong></p>
                                <span class="activity-time">5 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">⭐</div>
                            <div class="activity-content">
                                <p class="activity-text">Mendapat review 5 bintang dari <strong>Andi Wijaya</strong></p>
                                <span class="activity-time">1 hari yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Profile Section --}}
        <section id="profile" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Profil Profesional</h1>
                <p class="section-subtitle">Kelola informasi profil Anda</p>
            </div>

            <div class="dashboard-card">
                <div class="card-body">
                    @if ($professionalProfile)
                        <div class="profile-info">
                            <div class="profile-avatar">
                                <div class="avatar-placeholder professional">
                                    {{ substr($professionalProfile->user->nama_lengkap, 0, 1) }}
                                </div>
                            </div>
                            <div class="profile-details">
                                <h4 class="welcome-text">Selamat datang, {{ $professionalProfile->user->nama_lengkap }}</h4>
                                <div class="profile-grid">
                                    <div class="profile-item">
                                        <span class="profile-label">Spesialisasi</span>
                                        <span class="profile-value">
                                            {{ $professionalProfile->specialization ? $professionalProfile->specialization->nama_spesialisasi : '-' }}
                                        </span>
                                    </div>
                                    <div class="profile-item">
                                        <span class="profile-label">Lisensi Praktik</span>
                                        <span class="profile-value">{{ $professionalProfile->lisensi_praktik }}</span>
                                    </div>
                                    <div class="profile-item">
                                        <span class="profile-label">Email</span>
                                        <span class="profile-value">{{ $professionalProfile->user->email }}</span>
                                    </div>
                                    <div class="profile-item">
                                        <span class="profile-label">Terdaftar Sejak</span>
                                        <span class="profile-value">
                                            {{ $professionalProfile->user->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                                @if ($professionalProfile->deskripsi_profil)
                                    <div class="description-section">
                                        <span class="profile-label">Deskripsi Profil</span>
                                        <p class="profile-description">{{ $professionalProfile->deskripsi_profil }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-primary">Edit Profil</button>
                            <button class="btn-secondary">Ubah Status</button>
                            <button class="btn-warning">Ubah Password</button>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">👨‍⚕️</div>
                            <h3>Profil profesional tidak tersedia</h3>
                            <p>Silakan lengkapi profil Anda untuk mulai menerima klien</p>
                            <button class="btn-primary">Buat Profil</button>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Schedule Section --}}
        <section id="schedule" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Manajemen Jadwal</h1>
                <p class="section-subtitle">Kelola ketersediaan konsultasi Anda</p>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-header-content">
                        <h3 class="card-title">Jadwal Tersedia</h3>
                        <button class="btn-primary small">+ Tambah Jadwal</button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($availabilitySlots->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">📅</div>
                            <h3>Belum ada jadwal tersedia</h3>
                            <p>Tambahkan jadwal untuk mulai menerima janji temu dari klien</p>
                            <button class="btn-primary">Tambah Jadwal Pertama</button>
                        </div>
                    @else
                        <div class="schedule-container">
                            <div class="schedule-grid">
                                @foreach ($availabilitySlots as $slot)
                                    <div class="schedule-card {{ $slot->tersedia ? 'available' : 'booked' }}">
                                        <div class="schedule-header">
                                            <span class="schedule-day">{{ $slot->hari }}</span>
                                            <span class="schedule-status {{ $slot->tersedia ? 'available' : 'booked' }}">
                                                {{ $slot->tersedia ? 'Tersedia' : 'Terbooking' }}
                                            </span>
                                        </div>
                                        <div class="schedule-time">
                                            {{ \Carbon\Carbon::parse($slot->jam_mulai)->format('H:i') }} - 
                                            {{ \Carbon\Carbon::parse($slot->jam_selesai)->format('H:i') }}
                                        </div>
                                        <div class="schedule-actions">
                                            <button class="btn-secondary small">Edit</button>
                                            <button class="btn-warning small">Hapus</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="schedule-footer">
                                <button class="btn-primary">+ Tambah Jadwal Baru</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Appointments Section --}}
        <section id="appointments" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Janji Temu</h1>
                <p class="section-subtitle">Kelola janji temu yang akan datang</p>
            </div>

            {{-- Upcoming Appointments --}}
            <div class="dashboard-card">
                <div class="card-header">
                    <h3 class="card-title">Janji Mendatang</h3>
                </div>
                <div class="card-body">
                    <div class="appointments-list">
                        <!-- Dynamic appointments would go here -->
                        <div class="empty-state">
                            <div class="empty-icon">📅</div>
                            <h3>Belum ada janji mendatang</h3>
                            <p>Klien akan muncul di sini setelah membuat janji temu</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sessions Section --}}
        <section id="sessions" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Sesi Konsultasi</h1>
                <p class="section-subtitle">Kelola catatan dan riwayat sesi dengan klien</p>
            </div>

            @if ($sessions->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">💼</div>
                    <h3>Belum ada sesi konsultasi</h3>
                    <p>Klien akan muncul di sini setelah membuat janji temu</p>
                </div>
            @else
                <div class="dashboard-card">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Klien</th>
                                    <th>Tanggal Sesi</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sessions as $session)
                                <tr>
                                    <td class="client-cell">
                                        <div class="client-mini">
                                            <div class="mini-avatar client">
                                                {{ substr($session->client ? $session->client->user->nama_lengkap : 'K', 0, 1) }}
                                            </div>
                                            <div class="client-info">
                                                <span class="client-name">{{ $session->client ? $session->client->user->nama_lengkap : '-' }}</span>
                                                <span class="client-session-type">Konsultasi</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($session->tanggal_janji)->format('d M Y') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($session->waktu_mulai)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($session->waktu_akhir)->format('H:i') }}
                                    </td>
                                    <td>
                                        <span class="status-badge {{ strtolower($session->status) }}">
                                            {{ $session->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-secondary small">Lihat Detail</button>
                                            <button class="btn-primary small">Tambah Catatan</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </section>

        {{-- Reports Section --}}
        <section id="reports" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Laporan & Analitik</h1>
                <p class="section-subtitle">Tinjau kinerja dan statistik Anda</p>
            </div>

            <div class="empty-state">
                <div class="empty-icon">📊</div>
                <h3>Fitur Laporan Segera Hadir</h3>
                <p>Kami sedang mengembangkan fitur laporan yang lebih detail untuk Anda</p>
            </div>
        </section>

        {{-- Earnings Section --}}
        <section id="earnings" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Pendapatan</h1>
                <p class="section-subtitle">Kelola dan pantau pendapatan Anda</p>
            </div>

            <div class="empty-state">
                <div class="empty-icon">💰</div>
                <h3>Fitur Pendapatan Segera Hadir</h3>
                <p>Kami sedang mengembangkan fitur manajemen pendapatan untuk Anda</p>
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
        display: inline-block;
        margin-bottom: 4px;
    }

    .user-status {
        font-size: 0.75rem;
        font-weight: 500;
        padding: 2px 6px;
        border-radius: 8px;
        display: inline-block;
    }

    .user-status.active {
        background: rgba(167, 233, 175, 0.2);
        color: #2e7d32;
        border: 1px solid rgba(167, 233, 175, 0.4);
    }

    .user-status.inactive {
        background: rgba(255, 107, 107, 0.2);
        color: #c62828;
        border: 1px solid rgba(255, 107, 107, 0.4);
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

    .stat-icon.appointment {
        background: rgba(138, 180, 248, 0.1);
        color: #8AB4F8;
    }

    .stat-icon.completed {
        background: rgba(167, 233, 175, 0.1);
        color: #A7E9AF;
    }

    .stat-icon.clients {
        background: rgba(255, 152, 0, 0.1);
        color: #FF9800;
    }

    .stat-icon.rating {
        background: rgba(255, 193, 7, 0.1);
        color: #FFC107;
    }

    .stat-icon.revenue {
        background: rgba(76, 175, 80, 0.1);
        color: #4CAF50;
    }

    .stat-icon.availability {
        background: rgba(156, 39, 176, 0.1);
        color: #9C27B0;
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

    /* Existing styles from previous dashboard remain the same */
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

    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .card-body {
        padding: 30px;
    }

    /* ... (rest of the existing styles remain the same) ... */

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
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .actions-grid {
            grid-template-columns: 1fr;
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