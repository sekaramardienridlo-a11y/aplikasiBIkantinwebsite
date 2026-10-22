<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - BI-KANTIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard Admin Kantin</h2>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>

    <!-- Form Tambah Menu -->
    <div class="card mb-4 p-3">
        <h4>Tambah Menu Baru</h4>
        <form action="/admin/menu/store" method="POST" class="row g-3">
            @csrf
            <div class="col-md-3"><input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu" required></div>
            <div class="col-md-2"><input type="number" name="harga" class="form-control" placeholder="Harga" required></div>
            <div class="col-md-3"><input type="text" name="kategori" class="form-control" placeholder="Kategori (Makanan/Minuman)"></div>
            <div class="col-md-3"><input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"></div>
            <div class="col-md-1"><button class="btn btn-success w-100">Tambah</button></div>
        </form>
    </div>

    <!-- Kelola Menu -->
    <h4>Daftar Menu</h4>
    <table class="table table-bordered mb-5">
        <thead>
            <tr><th>Nama</th><th>Harga</th><th>Kategori</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($menus as $m)
            <tr>
                <td>{{ $m->nama_menu }}</td>
                <td>Rp{{ number_format($m->harga) }}</td>
                <td>{{ $m->kategori }}</td>
                <td><a href="/admin/menu/delete/{{ $m->id }}" class="btn btn-sm btn-danger">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Kelola Pesanan Masuk -->
    <h4>Pesanan Masuk</h4>
    <table class="table table-striped">
        <thead>
            <tr><th>Pemesan</th><th>Menu</th><th>Jumlah</th><th>Status</th><th>Ubah Status</th></tr>
        </thead>
        <tbody>
            @foreach($pesanans as $p)
            <tr>
                <td>{{ $p->username }}</td>
                <td>{{ $p->menu_id }}</td>
                <td>{{ $p->jumlah }}</td>
                <td><span class="badge bg-info">{{ $p->status }}</span></td>
                <td>
                    <form action="/admin/pesanan/status/{{ $p->id }}" method="POST" class="d-flex gap-2">
                        @csrf
                        <select name="status" class="form-select form-select-sm">
                            <option value="Menunggu Konfirmasi" {{ $p->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                            <option value="Sedang Dimasak" {{ $p->status == 'Sedang Dimasak' ? 'selected' : '' }}>Sedang Dimasak</option>
                            <option value="Siap Diambil" {{ $p->status == 'Siap Diambil' ? 'selected' : '' }}>Siap Diambil</option>
                            <option value="Selesai" {{ $p->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        <button class="btn btn-sm btn-primary">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>