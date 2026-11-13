<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Pencatatan Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light text-dark">

<!-- Top Header -->
<header class="fixed top-0 bg-white shadow-sm border-bottom py-3 px-3 d-flex align-items-center justify-content-between">
    <div></div>
    <div class="d-flex align-items-center gap-3">   
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm text-danger hover:bg-light rounded-pill px-3"><i class="fas fa-sign-out-alt me-1"></i>Keluar</button>
        </form>
    </div>
</header>

<div class="d-flex">
    @include('components.sidebar', ['active' => 'dashboard'])

    <!-- Main Content -->
    <main class="main-content p-4 min-vh-100">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h4 fw-bold text-dark mb-1">Selamat Datang</h1>
                    <p class="text-muted small d-flex align-items-center gap-2 mb-0">
                        <i class="fas fa-calendar-day me-1"></i>
                        <span id="current-date"></span>
                    </p>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-4">
                    <div class="card shadow-sm border h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small d-block">Total Pegawai</span>
                                <span class="h3 fw-bold">{{ $totalPegawai }}</span>
                            </div>
                            <div class="bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-4">
                <h2 class="h5 fw-bold mb-3">Aksi Cepat</h2>
                <div class="row g-3">
                    <div class="col-12 col-lg-6">
                        <a href="{{ route('pegawai.index') }}" class="card h-100 shadow-sm border text-decoration-none d-flex flex-column text-start">
                            <div class="card-body d-flex align-items-center justify-content-between mb-3">
                                <div class="bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                    <i class="fas fa-table"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="fw-bold text-dark small group-hover:text-primary transition">Daftar Pegawai</h6>
                                <p class="text-muted small">Telusuri direktori dan ubah data profil pegawai</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <a href="{{ route('pegawai.create') }}" class="card h-100 shadow-sm border text-decoration-none d-flex flex-column text-start">
                            <div class="card-body d-flex align-items-center justify-content-between mb-3">
                                <div class="bg-light text-success rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="fw-bold text-dark small group-hover:text-success transition">Tambah Pegawai</h6>
                                <p class="text-muted small">Formulir pendaftaran staf baru ke database</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Employees Table -->
            <div class="card shadow-sm border overflow-hidden">
                <div class="card-header bg-light border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <h5 class="mb-0 fw-bold">Pegawai Baru Ditambahkan</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light small text-uppercase">
                                <tr>
                                    <th class="px-4">Nama &amp; Posisi</th>
                                    <th class="px-4">NIP / ID</th>
                                    <th class="px-4">Jabatan</th>
                                    <th class="px-4 text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawaiTerbaru as $p)
                                <tr>
                                    <td class="px-4 align-middle">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <div class="fw-medium small">{{ $p->nama }}</div>
                                                <div class="text-muted smaller">{{ $p->jabatan }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 align-middle small text-muted font-monospace">{{ $p->nip }}</td>
                                    <td class="px-4 align-middle small">{{ $p->jabatan }}</td>
                                    <td class="px-4 align-middle text-end">
                                        <a href="{{ route('pegawai.show', $p->id) }}" class="text-muted hover:text-primary" title="Lihat Profil"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-4 text-center text-muted small">Belum ada data pegawai.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light border-top d-flex justify-content-between align-items-center small text-muted">
                    <span>Menampilkan pegawai baru terdaftar</span>
                    <a href="{{ route('pegawai.index') }}" class="text-primary text-decoration-none fw-medium">Lihat semua data pegawai</a>
                </div>
            </div>
        </div>
    </main>
</div>


<script>
    const today = new Date();
    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
    document.getElementById('current-date').textContent = today.toLocaleDateString('id-ID', options);
</script>

</body>
</html>
