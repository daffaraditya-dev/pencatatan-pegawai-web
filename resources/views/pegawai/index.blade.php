<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Pegawai</h2>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jabatan }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ route('pegawai.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>