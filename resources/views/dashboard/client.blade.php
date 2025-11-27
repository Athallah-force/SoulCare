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
                    <span class="user-role">Klien</span>
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
                    <a href="#professionals" class="nav-link" data-section="professionals">
                        <span class="nav-icon">👨‍⚕️</span>
                        <span class="nav-text">Profesional</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#appointments" class="nav-link" data-section="appointments">
                        <span class="nav-icon">📅</span>
                        <span class="nav-text">Janji Temu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#history" class="nav-link" data-section="history">
                        <span class="nav-icon">📋</span>
                        <span class="nav-text">Riwayat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#transactions" class="nav-link" data-section="transactions">
                        <span class="nav-icon">💳</span>
                        <span class="nav-text">Transaksi</span>
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
                <p class="section-subtitle">Ringkasan aktivitas dan statistik Anda</p>
            </div>

            {{-- Stats Cards --}}
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon appointment">📅</div>
                    <div class="stat-content">
                        <h3 class="stat-number">5</h3>
                        <p class="stat-label">Janji Mendatang</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon completed">✅</div>
                    <div class="stat-content">
                        <h3 class="stat-number">12</h3>
                        <p class="stat-label">Sesi Selesai</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon professional">👨‍⚕️</div>
                    <div class="stat-content">
                        <h3 class="stat-number">3</h3>
                        <p class="stat-label">Profesional</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon rating">⭐</div>
                    <div class="stat-content">
                        <h3 class="stat-number">4.8</h3>
                        <p class="stat-label">Rating Rata-rata</p>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="quick-actions">
                <h3 class="actions-title">Aksi Cepat</h3>
                <div class="actions-grid">
                    <button class="action-card" data-section="professionals">
                        <div class="action-icon">🔍</div>
                        <span class="action-text">Cari Profesional</span>
                    </button>
                    <button class="action-card" data-section="appointments">
                        <div class="action-icon">➕</div>
                        <span class="action-text">Buat Janji</span>
                    </button>
                    <button class="action-card" data-section="profile">
                        <div class="action-icon">✏️</div>
                        <span class="action-text">Edit Profil</span>
                    </button>
                    <button class="action-card" data-section="history">
                        <div class="action-icon">📋</div>
                        <span class="action-text">Lihat Riwayat</span>
                    </button>
                </div>
            </div>
        </section>

        {{-- Profile Section --}}
        <section id="profile" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Profil Saya</h1>
                <p class="section-subtitle">Kelola informasi profil Anda</p>
            </div>

            <div class="dashboard-card">
                <div class="card-body">
                    @if ($clientProfile)
                        <div class="profile-info">
                            <div class="profile-avatar">
                                <div class="avatar-placeholder">
                                    {{ substr($clientProfile->user->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="profile-details">
                                <h4 class="welcome-text">Selamat datang, {{ $clientProfile->user->name }}</h4>
                                <div class="profile-grid">
                                    <div class="profile-item">
                                        <span class="profile-label">Alamat</span>
                                        <span class="profile-value">{{ $clientProfile->alamat ?? '-' }}</span>
                                    </div>
                                    <div class="profile-item">
                                        <span class="profile-label">Tanggal Lahir</span>
                                        <span class="profile-value">
                                            {{ $clientProfile->tanggal_lahir ? \Carbon\Carbon::parse($clientProfile->tanggal_lahir)->format('d M Y') : '-' }}
                                        </span>
                                    </div>
                                    <div class="profile-item">
                                        <span class="profile-label">Email</span>
                                        <span class="profile-value">{{ $clientProfile->user->email }}</span>
                                    </div>
                                    <div class="profile-item">
                                        <span class="profile-label">Terdaftar Sejak</span>
                                        <span class="profile-value">
                                            {{ $clientProfile->user->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-primary">Edit Profil</button>
                            <button class="btn-secondary">Ubah Password</button>
                        </div>
                    @else
                        <div class="empty-state">
                            <p>Profil klien tidak tersedia.</p>
                            <button class="btn-primary">Buat Profil</button>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Professionals Section --}}
        <section id="professionals" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Daftar Profesional</h1>
                <p class="section-subtitle">Pilih profesional untuk konsultasi</p>
            </div>

            @forelse ($professionals as $professional)
                <div class="dashboard-card professional-card">
                    <div class="card-body">
                        <div class="professional-header">
                            <div class="professional-avatar">
                                <div class="avatar-placeholder professional">
                                    {{ substr($professional->user->nama_lengkap, 0, 1) }}
                                </div>
                            </div>
                            <div class="professional-info">
                                <h4 class="professional-name">{{ $professional->user->nama_lengkap }}</h4>
                                <div class="professional-meta">
                                    <span class="specialization-badge">
                                        {{ $professional->specialization->nama_spesialisasi ?? 'General' }}
                                    </span>
                                    <span class="rate-badge">
                                        Rp {{ number_format($professional->tarif_sesi, 0, ',', '.') }}/sesi
                                    </span>
                                </div>
                                <p class="professional-bio">
                                    {{ $professional->deskripsi_profil ?? 'Profesional berpengalaman di bidangnya.' }}
                                </p>
                            </div>
                        </div>

                        <div class="availability-section">
                            <h5 class="availability-title">Ketersediaan Jadwal</h5>
                            
                            @if (empty($professional->availabilitySlots) || $professional->availabilitySlots->isEmpty())
                                <div class="empty-schedule">
                                    <p>Tidak ada jadwal tersedia saat ini</p>
                                </div>
                            @else
                                <div class="schedule-grid">
                                    @foreach ($professional->availabilitySlots as $slot)
                                        <div class="schedule-item {{ $slot->tersedia ? 'available' : 'unavailable' }}">
                                            <span class="schedule-day">{{ $slot->hari }}</span>
                                            <span class="schedule-time">
                                                {{ \Carbon\Carbon::parse($slot->jam_mulai)->format('H:i') }} - 
                                                {{ \Carbon\Carbon::parse($slot->jam_akhir)->format('H:i') }}
                                            </span>
                                            <span class="schedule-status">
                                                {{ $slot->tersedia ? 'Tersedia' : 'Penuh' }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <button class="btn-primary full-width">Buat Janji Temu</button>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">👨‍⚕️</div>
                    <h3>Tidak ada profesional yang tersedia</h3>
                    <p>Silakan coba lagi nanti atau hubungi administrator</p>
                </div>
            @endforelse
        </section>

        {{-- Appointments Section --}}
        <section id="appointments" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Janji Temu Saya</h1>
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
                            <p>Jadwalkan janji temu dengan profesional</p>
                            <button class="btn-primary" data-section="professionals">Cari Profesional</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- History Section --}}
        <section id="history" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Riwayat Janji Temu</h1>
                <p class="section-subtitle">Lihat dan kelola janji temu Anda</p>
            </div>

            @if (empty($riwayat))
                <div class="empty-state">
                    <div class="empty-icon">📅</div>
                    <h3>Belum ada riwayat janji temu</h3>
                    <p>Jadwalkan janji temu pertama Anda dengan profesional</p>
                </div>
            @else
                <div class="dashboard-card">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Profesional</th>
                                    <th>Jenis Sesi</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sessions as $session)
                                <tr>
                                    <td class="professional-cell">
                                        <div class="professional-mini">
                                            <div class="mini-avatar">
                                                {{ substr($session->professional->user->nama_lengkap ?? 'P', 0, 1) }}
                                            </div>
                                            <span>{{ $session->professional->user->nama_lengkap ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $session->jenis_sesi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($session->waktu_mulai)->format('d M Y, H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($session->waktu_akhir)->format('d M Y, H:i') }}</td>
                                    <td>
                                        <span class="status-badge {{ strtolower($session->status_sesi) }}">
                                            {{ $session->status_sesi }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            @if ($session->link_sesi)
                                                <a href="{{ $session->link_sesi }}" class="btn-secondary small">Masuk Sesi</a>
                                            @endif
                                            @if ($session->status_sesi === 'Selesai')
                                                <button class="btn-warning small">Beri Review</button>
                                            @endif
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

        {{-- Transactions Section --}}
        <section id="transactions" class="dashboard-section">
            <div class="section-header">
                <h1 class="section-title">Riwayat Transaksi</h1>
                <p class="section-subtitle">Lihat riwayat pembayaran Anda</p>
            </div>

            <div class="empty-state">
                <div class="empty-icon">💳</div>
                <h3>Belum ada riwayat transaksi</h3>
                <p>Transaksi akan muncul di sini setelah Anda melakukan pembayaran</p>
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

    .stat-icon.appointment {
        background: rgba(138, 180, 248, 0.1);
        color: #8AB4F8;
    }

    .stat-icon.completed {
        background: rgba(167, 233, 175, 0.1);
        color: #A7E9AF;
    }

    .stat-icon.professional {
        background: rgba(255, 152, 0, 0.1);
        color: #FF9800;
    }

    .stat-icon.rating {
        background: rgba(255, 193, 7, 0.1);
        color: #FFC107;
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