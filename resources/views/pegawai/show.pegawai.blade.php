<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Detail Pegawai</h2>

<table class="table table-bordered w-50">
    <tr><th>NIP</th><td>{{ $item->nip }}</td></tr>
    <tr><th>Nama</th><td>{{ $item->nama }}</td></tr>
    <tr><th>Jabatan</th><td>{{ $item->jabatan }}</td></tr>
    <tr><th>Nomor Telepon</th><td>{{ $item->nomor_telepon }}</td></tr>
    <tr><th>Email</th><td>{{ $item->email }}</td></tr>
    <tr><th>Alamat</th><td>{{ $item->alamat }}</td></tr>
</table>

<a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>

</body>
</html>
