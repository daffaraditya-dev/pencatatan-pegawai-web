<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Pegawai</h2>

<form action="{{ route('pegawai.update', $item->id) }}" method="POST" class="w-50">
    @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" name="nip" value="{{ old('nip', $item->nip) }}" class="form-control @error('nip') is-invalid @enderror" required>
        @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $item->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" value="{{ old('jabatan', $item->jabatan) }}" class="form-control @error('jabatan') is-invalid @enderror" required>
        @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $item->nomor_telepon) }}" class="form-control @error('nomor_telepon') is-invalid @enderror" required>
        @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $item->email) }}" class="form-control @error('email') is-invalid @enderror" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat', $item->alamat) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>