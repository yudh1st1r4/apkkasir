<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pelanggan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('pelanggan.update', $pelanggan->pelangganID) }}">
    @csrf
    @method('PUT')
    
    <div>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" required>
    </div>

    <div>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $pelanggan->nama) }}" required>
    </div>

    <div>
        <label for="nomortelepon">Nomor Telepon:</label>
        <input type="text" name="nomortelepon" id="nomortelepon" value="{{ old('nomortelepon', $pelanggan->nomortelepon) }}" required>
    </div>

    <button type="submit">Update</button>
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
