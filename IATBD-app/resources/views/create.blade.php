<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huis Toevoegen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-viewComponents.navbar />
    
    <main class="home-create">
        <h1>Huis Toevoegen</h1>

        <!-- Succes- en foutmeldingen -->
        @if(session('status'))
            <div class="alert alert-success">
                <p>{{ session('status') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <p>{{ session('error') }}</p>
            </div>
        @endif



        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="address">Adres</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" required>
                @error('address')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="city">Stad</label>
                <input type="text" name="city" id="city" value="{{ old('city') }}" required>
                @error('city')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="media">Afbeeldingen (meerdere bestanden toegestaan)</label>
                <input type="file" name="media[]" id="media" multiple required>
                @error('media.*')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Huis Toevoegen</button>
        </form>
    </main>
</body>
</html>
