<!-- resources/views/pelanggan/show.blade.php -->
<h1>Detail Pelanggan</h1>

<div>
    <strong>Nama Pelanggan:</strong> {{ $pelanggan->namapelanggan }}
</div>
<div>
    <strong>Alamat:</strong> {{ $pelanggan->alamat }}
</div>
<div>
    <strong>Nomor Telepon:</strong> {{ $pelanggan->nomortelepon }}
</div>

<!-- Tombol untuk mengedit pelanggan -->
<a href="{{ route('pelanggan.edit', $pelanggan->pelangganID) }}">Edit</a>

<!-- Form untuk menghapus pelanggan -->
<form action="{{ route('pelanggan.destroy', $pelanggan->pelangganID) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
</form>

<!-- Form untuk mengedit pelanggan dalam tampilan yang sama -->
<h2>Edit Pelanggan</h2>
<form action="{{ route('pelanggan.update', $pelanggan->pelangganID) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="namapelanggan">Nama Pelanggan:</label>
        <input type="text" id="namapelanggan" name="namapelanggan" value="{{ $pelanggan->namapelanggan }}" required>
    </div>
    <div>
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required>{{ $pelanggan->alamat }}</textarea>
    </div>
    <div>
        <label for="nomortelepon">Nomor Telepon:</label>
        <input type="text" id="nomortelepon" name="nomortelepon" value="{{ $pelanggan->nomortelepon }}" required>
    </div>
    <button type="submit">Perbarui</button>
</form>
