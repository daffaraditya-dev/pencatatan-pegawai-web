<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pegawai</title>
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
        <h2 class="fw-bold text-dark">Daftar Pegawai</h2>
        <p class="text-muted small">Menampilkan daftar pegawai.</p>
    </div>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Tambah Pegawai</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card shadow-sm border">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;" class="text-center">No.</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th class="text-center" style="width: 18%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="text-nowrap">{{ $item->email }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('pegawai.show', $item->id) }}" class="btn btn-sm btn-outline-primary" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" style="display:inline" data-ajax-delete>
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin hapus data pegawai ini?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data pegawai.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </main>
</div>

</body>
</html>