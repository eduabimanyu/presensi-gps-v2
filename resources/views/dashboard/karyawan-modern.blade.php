<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="theme-color" content="{{ $t['primary'] ?? '#0D9488' }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Dashboard Karyawan | Gawe</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta20/dist/css/tabler.min.css">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <style>
        :root {
            --primary: {{ $t['primary'] ?? '#0D9488' }};
            --primary-dark: {{ $t['primary_dark'] ?? '#0F766E' }};
            --primary-light: {{ $t['primary_light'] ?? '#CCFBF1' }};
            --accent: #F59E0B;
            --bg: {{ $t['bg_body'] ?? '#F8FAFC' }};
            --surface: #FFFFFF;
            --text: #0F172A;
            --text-secondary: #64748B;
            --border: #E2E8F0;
            --error: #EF4444;
            --success: #10B981;
            --warning: #F59E0B;
            --info: #3B82F6;
            --radius: 12px;
            --radius-sm: 8px;
            --shadow: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            -webkit-tap-highlight-color: transparent;
        }

        /* Top Navigation */
        .top-nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-sm {
            width: 40px;
            height: 40px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 800;
            color: white;
        }

        .app-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--bg);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
            color: var(--text-secondary);
        }

        .nav-icon:hover {
            background: var(--border);
        }

        .nav-icon i {
            font-size: 20px;
        }

        .nav-icon .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: var(--error);
            border-radius: 50%;
            font-size: 11px;
            font-weight: 600;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Main Content */
        .main-content {
            padding: 24px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 16px;
            padding: 28px;
            color: white;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-greeting {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .welcome-date {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .welcome-date i {
            font-size: 18px;
        }

        .clock-display {
            font-size: 42px;
            font-weight: 800;
            font-variant-numeric: tabular-nums;
            letter-spacing: 2px;
        }

        .clock-label {
            font-size: 13px;
            opacity: 0.8;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .clock-label i {
            font-size: 16px;
        }

        /* Attendance Status */
        .attendance-status {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .status-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 18px;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .status-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 24px;
        }

        .status-icon.success { background: #D1FAE5; color: #065F46; }
        .status-icon.warning { background: #FEF3C7; color: #92400E; }
        .status-icon.info { background: #DBEAFE; color: #1E40AF; }

        .status-info h3 {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .status-info .value {
            font-size: 22px;
            font-weight: 700;
            color: var(--text);
        }

        .status-info .time {
            font-size: 12px;
            color: var(--text-secondary);
            margin-top: 2px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .status-info .time i {
            font-size: 14px;
        }

        /* Quick Actions */
        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title i {
            font-size: 20px;
            color: var(--primary);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .action-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            color: inherit;
        }

        .action-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .action-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 26px;
        }

        .action-icon.teal { background: var(--primary-light); color: var(--primary); }
        .action-icon.blue { background: #DBEAFE; color: var(--info); }
        .action-icon.amber { background: #FEF3C7; color: var(--warning); }
        .action-icon.purple { background: #E9D5FF; color: #7C3AED; }

        .action-card h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 4px;
        }

        .action-card p {
            font-size: 11px;
            color: var(--text-secondary);
        }

        /* Bottom Grid */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .info-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .info-card-header h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-card-header h3 i {
            font-size: 18px;
            color: var(--primary);
        }

        .info-card-header .view-all {
            font-size: 12px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .info-card-header .view-all i {
            font-size: 14px;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px;
            background: var(--bg);
            border-radius: var(--radius-sm);
            margin-bottom: 10px;
        }

        .schedule-item:last-child {
            margin-bottom: 0;
        }

        .schedule-day {
            width: 44px;
            text-align: center;
        }

        .schedule-day .day {
            font-size: 11px;
            color: var(--text-secondary);
            margin-bottom: 2px;
        }

        .schedule-day .date {
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
        }

        .schedule-divider {
            width: 1px;
            height: 36px;
            background: var(--border);
        }

        .schedule-details {
            flex: 1;
        }

        .schedule-details .shift {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 2px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .schedule-details .shift i {
            font-size: 14px;
            color: var(--primary);
        }

        .schedule-details .hours {
            font-size: 12px;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .schedule-details .hours i {
            font-size: 12px;
        }

        .schedule-status {
            padding: 5px 10px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .schedule-status i {
            font-size: 12px;
        }

        .schedule-status.active {
            background: #D1FAE5;
            color: #065F46;
        }

        .schedule-status.upcoming {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .leave-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            background: var(--bg);
            border-radius: var(--radius-sm);
            margin-bottom: 10px;
        }

        .leave-item:last-child {
            margin-bottom: 0;
        }

        .leave-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .leave-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .leave-icon.annual { background: #D1FAE5; color: #065F46; }
        .leave-icon.sick { background: #FEE2E2; color: #991B1B; }
        .leave-icon.long { background: #DBEAFE; color: #1E40AF; }

        .leave-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 2px;
        }

        .leave-info p {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .leave-balance {
            text-align: right;
        }

        .leave-balance .days {
            font-size: 22px;
            font-weight: 700;
            color: var(--text);
        }

        .leave-balance .label {
            font-size: 11px;
            color: var(--text-secondary);
        }

        /* Responsive - Mobile First */
        @media (max-width: 1024px) {
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 16px;
            }

            .top-nav {
                padding: 12px 16px;
            }

            .attendance-status {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr 1fr;
            }

            .welcome-greeting {
                font-size: 20px;
            }

            .clock-display {
                font-size: 32px;
            }

            .status-card {
                padding: 14px;
            }

            .status-icon {
                width: 44px;
                height: 44px;
                font-size: 22px;
            }

            .status-info .value {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .quick-actions {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .action-card {
                padding: 16px;
            }

            .action-icon {
                width: 48px;
                height: 48px;
                font-size: 24px;
            }

            .bottom-grid {
                gap: 16px;
            }

            .info-card {
                padding: 16px;
            }

            .schedule-item, .leave-item {
                padding: 10px;
            }
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.4s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Touch feedback */
        .action-card:active {
            transform: scale(0.97);
        }

        .nav-icon:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="top-nav">
        <div class="nav-left">
            <div class="logo-sm">G</div>
            <span class="app-name">Gawe</span>
        </div>
        <div class="nav-right">
            <a href="{{ route('karyawan.notifikasi') }}" class="nav-icon">
                <i class="ti ti-bell"></i>
                @if(isset($unreadCount) && $unreadCount > 0)
                    <span class="badge">{{ $unreadCount }}</span>
                @endif
            </a>
            <a href="{{ route('karyawan.profile') }}" class="user-avatar">
                {{ substr(Auth::user()->name ?? 'U', 0, 2) }}
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Card -->
        <div class="welcome-card fade-in">
            <div class="welcome-content">
                <h1 class="welcome-greeting">Selamat {{ $greeting ?? 'Pagi' }}, {{ Auth::user()->name ?? 'Karyawan' }}! 👋</h1>
                <p class="welcome-date">
                    <i class="ti ti-calendar"></i>
                    {{ $date ?? now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                </p>
                <div class="clock-display" id="clock">{{ $time ?? now()->format('H:i:s') }}</div>
                <p class="clock-label">
                    <i class="ti ti-clock"></i>
                    Waktu sekarang (WIB)
                </p>
            </div>
        </div>

        <!-- Attendance Status -->
        <div class="attendance-status fade-in" style="animation-delay: 0.1s">
            <div class="status-card">
                <div class="status-icon success">
                    <i class="ti ti-circle-check"></i>
                </div>
                <div class="status-info">
                    <h3>Status Hari Ini</h3>
                    <div class="value" style="color: var(--success);">{{ $statusHariIni ?? 'Hadir' }}</div>
                    <div class="time">
                        <i class="ti ti-clock"></i>
                        Masuk: {{ $jamMasuk ?? '08:00' }} WIB
                    </div>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon info">
                    <i class="ti ti-clock"></i>
                </div>
                <div class="status-info">
                    <h3>Jam Kerja</h3>
                    <div class="value">{{ $jamKerja ?? '8' }} jam</div>
                    <div class="time">
                        <i class="ti ti-clock"></i>
                        {{ $jamMulai ?? '08:00' }} - {{ $jamSelesai ?? '17:00' }} WIB
                    </div>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon warning">
                    <i class="ti ti-chart-line"></i>
                </div>
                <div class="status-info">
                    <h3>Kehadiran Bulan Ini</h3>
                    <div class="value">{{ $kehadiranBulan ?? '22' }} hari</div>
                    <div class="time">dari {{ $hariKerja ?? '25' }} hari kerja</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <h2 class="section-title fade-in" style="animation-delay: 0.2s">
            <i class="ti ti-bolt"></i>
            Aksi Cepat
        </h2>
        <div class="quick-actions fade-in" style="animation-delay: 0.2s">
            <a href="{{ route('karyawan.presensi.create') }}" class="action-card">
                <div class="action-icon teal">
                    <i class="ti ti-map-pin"></i>
                </div>
                <h4>Absen Masuk</h4>
                <p>Check-in dengan GPS</p>
            </a>
            <a href="{{ route('karyawan.presensi.create') }}" class="action-card">
                <div class="action-icon blue">
                    <i class="ti ti-map-pin-off"></i>
                </div>
                <h4>Absen Pulang</h4>
                <p>Check-out hari ini</p>
            </a>
            <a href="{{ route('karyawan.cuti.create') }}" class="action-card">
                <div class="action-icon amber">
                    <i class="ti ti-calendar-event"></i>
                </div>
                <h4>Ajukan Cuti</h4>
                <p>Pengajuan cuti baru</p>
            </a>
            <a href="{{ route('karyawan.lembur.create') }}" class="action-card">
                <div class="action-icon purple">
                    <i class="ti ti-clock-plus"></i>
                </div>
                <h4>Ajukan Lembur</h4>
                <p>Pengajuan lembur</p>
            </a>
        </div>

        <!-- Bottom Grid -->
        <div class="bottom-grid fade-in" style="animation-delay: 0.3s">
            <!-- Schedule Card -->
            <div class="info-card">
                <div class="info-card-header">
                    <h3>
                        <i class="ti ti-calendar"></i>
                        Jadwal Minggu Ini
                    </h3>
                    <a href="{{ route('karyawan.jadwal') }}" class="view-all">
                        Lihat Semua
                        <i class="ti ti-chevron-right"></i>
                    </a>
                </div>
                
                @foreach($jadwalMinggu ?? [] as $jadwal)
                <div class="schedule-item">
                    <div class="schedule-day">
                        <div class="day">{{ $jadwal['day'] }}</div>
                        <div class="date">{{ $jadwal['date'] }}</div>
                    </div>
                    <div class="schedule-divider"></div>
                    <div class="schedule-details">
                        <div class="shift">
                            <i class="ti ti-clock"></i>
                            {{ $jadwal['shift'] }}
                        </div>
                        <div class="hours">
                            <i class="ti ti-clock"></i>
                            {{ $jadwal['hours'] }}
                        </div>
                    </div>
                    <span class="schedule-status {{ $jadwal['status_class'] }}">
                        <i class="ti ti-{{ $jadwal['status_icon'] }}"></i>
                        {{ $jadwal['status_text'] }}
                    </span>
                </div>
                @endforeach
            </div>

            <!-- Leave Balance Card -->
            <div class="info-card">
                <div class="info-card-header">
                    <h3>
                        <i class="ti ti-calendar-star"></i>
                        Sisa Cuti
                    </h3>
                    <a href="{{ route('karyawan.cuti.history') }}" class="view-all">
                        Riwayat
                        <i class="ti ti-chevron-right"></i>
                    </a>
                </div>

                <div class="leave-item">
                    <div class="leave-info">
                        <div class="leave-icon annual">
                            <i class="ti ti-calendar-event"></i>
                        </div>
                        <div>
                            <h4>Cuti Tahunan</h4>
                            <p>Berlaku hingga Desember {{ date('Y') }}</p>
                        </div>
                    </div>
                    <div class="leave-balance">
                        <div class="days">{{ $cutiTahunan ?? 12 }}</div>
                        <div class="label">hari tersisa</div>
                    </div>
                </div>

                <div class="leave-item">
                    <div class="leave-info">
                        <div class="leave-icon sick">
                            <i class="ti ti-medical-cross"></i>
                        </div>
                        <div>
                            <h4>Cuti Sakit</h4>
                            <p>Perlu surat dokter</p>
                        </div>
                    </div>
                    <div class="leave-balance">
                        <div class="days">{{ $cutiSakit ?? 5 }}</div>
                        <div class="label">hari tersisa</div>
                    </div>
                </div>

                <div class="leave-item">
                    <div class="leave-info">
                        <div class="leave-icon long">
                            <i class="ti ti-plane"></i>
                        </div>
                        <div>
                            <h4>Cuti Besar</h4>
                            <p>Untuk karyawan tetap</p>
                        </div>
                    </div>
                    <div class="leave-balance">
                        <div class="days">{{ $cutiBesar ?? 30 }}</div>
                        <div class="label">hari tersisa</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Live Clock
        function updateClock() {
            const now = new Date();
            const options = { 
                timeZone: 'Asia/Jakarta',
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit', 
                hour12: false
            };
            const timeString = now.toLocaleTimeString('id-ID', options);
            document.getElementById('clock').textContent = timeString;
        }

        setInterval(updateClock, 1000);
        updateClock();

        // Toastr settings
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };

        @if(session('success'))
            toastr.success('{{ session("success") }}');
        @endif

        @if(session('error'))
            toastr.error('{{ session("error") }}');
        @endif
    </script>
</body>
</html>
