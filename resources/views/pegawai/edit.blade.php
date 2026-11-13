<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    @include('components.sidebar', ['active' => 'pegawai'])
    <main class="main-content p-4 min-vh-100">
        <div class="container-fluid">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark">Edit Pegawai</h2>
        <p class="text-muted small">Ubah data pegawai yang sudah terdaftar.</p>
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
        <form action="{{ route('pegawai.update', $item->id) }}" method="POST" class="validate-js">
            @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $item->nip) }}" required>
        @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $item->nama) }}" required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $item->jabatan) }}" required>
        @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon', $item->nomor_telepon) }}" required>
        @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $item->email) }}" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat', $item->alamat) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update</button>
    </div>
</div>
        </div>
    </main>
</div>

</body>
</html>
