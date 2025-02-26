<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Artikel Baru</title>
</head>

<body>
    <h1>Buat Artikel Baru</h1>

    <!-- Form untuk membuat artikel baru -->
    <form action="{{ route('artikels.store') }}" method="POST">
        @csrf

        <div>
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required>
        </div>
        <div>
            <label for="konten">Konten</label>
            <textarea id="konten" name="konten" rows="5" required>{{ old('konten') }}</textarea>
        </div>
        <div>
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}" required>
        </div>
        <div>
            <button type="submit">Simpan</button>
            <a href="{{ route('artikels.index') }}">Kembali</a>
        </div>
    </form>

    @if ($errors->any())
    <div style="color: red; margin-top: 20px;">
        <h4>Error:</h4>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>

</html>