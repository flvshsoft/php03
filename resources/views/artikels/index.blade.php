<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
</head>

<body>
    <h1>Daftar Artikel</h1>

    <!-- Tombol untuk membuat artikel baru -->
    <a href="{{ route('artikels.create') }}">Buat Artikel Baru</a>

    <table border="1" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($artikels as $artikel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $artikel->judul }}</td>
                <td>{{ Str::limit($artikel->konten, 50) }}</td>
                <td>{{ $artikel->penulis }}</td>
                <td>
                    <a href="{{ route('artikels.show', $artikel->id) }}">Lihat</a>
                    <a href="{{ route('artikels.edit', $artikel->id) }}">Edit</a>
                    <form action="{{ route('artikels.destroy', $artikel->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada artikel yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>