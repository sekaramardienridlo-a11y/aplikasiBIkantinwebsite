<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa - BI-KANTIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Katalog Kantin Online</h2>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>

    <h4>Menu Makanan & Minuman</h4>
    <div class="row mb-5">
        @foreach($menus as $m)
        <div class="col-md-3 mb-3">
            <div class="card h-100 p-3">
                <h5>{{ $m->nama_menu }}</h5>
                <p class="text-muted">{{ $m->deskripsi }}</p>
                <h6>Rp{{ number_format($m->harga) }}</h6>
                <form action="/siswa/pesanan/store" method="POST">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $m->id }}">
                    <div class="input-group mb-2">
                        <input type="number" name="jumlah" value="1" min="1" class="form-control">
                        <button class="btn btn-primary" type="submit">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <h4>Riwayat Status Pesanan Anda</h4>
    <table class="table table-bordered">
        <thead>
            <tr><th>Menu</th><th>Jumlah</th><th>Status</th></tr>
        </thead>
        <tbody>
            @foreach($pesanans as $p)
            <tr>
                <td>{{ $p->menu_id }}</td>
                <td>{{ $p->jumlah }}</td>
                <td><span class="badge bg-warning text-dark">{{ $p->status }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>