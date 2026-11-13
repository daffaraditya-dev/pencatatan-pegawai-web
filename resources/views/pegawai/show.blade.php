<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark">

<!-- Top Header -->
<header class="fixed top-0 bg-white shadow-sm border-bottom py-3 px-3 d-flex align-items-center justify-content-between">
    <div></div>
    <div class="d-flex align-items-center gap-3">
        <div class="d-flex align-items-center gap-2">
            <img class="rounded-circle border" src="https://ui-avatars.com/api/?name=Admin+Kepegawaian&background=004ac6&color=fff" alt="Profile" style="width:32px;height:32px;">
            <div class="d-none d-md-flex flex-column text-left small">
                <span class="fw-medium text-dark">Admin Kepegawaian</span>
                <span class="text-muted">HR Operations</span>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm text-danger hover:bg-light rounded-pill px-3"><i class="fas fa-sign-out-alt me-1"></i>Keluar</button>
        </form>
    </div>
</header>

<div class="d-flex">
    @include('components.sidebar', ['active' => 'pegawai'])
    <main class="main-content p-4 min-vh-100">
        <div class="container-fluid">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark">Detail Pegawai</h2>
        <p class="text-muted small">Informasi lengkap data pegawai.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen me-1"></i>Edit</a>
        <a href="{{ route('pegawai.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left me-1"></i>Kembali</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card shadow-sm border">
    <div class="card-body">
        <table class="table table-bordered w-50">
    <tr><th style="width: 30%;">NIP</th><td>{{ $item->nip }}</td></tr>
    <tr><th>Nama</th><td>{{ $item->nama }}</td></tr>
    <tr><th>Jabatan</th><td>{{ $item->jabatan }}</td></tr>
    <tr><th>Nomor Telepon</th><td>{{ $item->nomor_telepon }}</td></tr>
    <tr><th>Email</th><td>{{ $item->email }}</td></tr>
    <tr><th>Alamat</th><td>{{ $item->alamat }}</td></tr>
</table>
    </div>
</div>
        </div>
    </main>
</div>

</body>
</html>
