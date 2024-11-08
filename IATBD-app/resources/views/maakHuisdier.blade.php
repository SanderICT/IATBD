<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Huisdier Toevoegen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="add-pet-content">
        <x-viewComponents.navbar />
        <div class="form-container">
            <h1>Voeg een Nieuw Huisdier Toe</h1>

            <!-- Succes- en foutmeldingen -->
            @if(session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('huisdieren.store') }}" method="POST" class="pet-form" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Naam van het huisdier">
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="age">Leeftijd</label>
                    <input type="number" id="age" name="age" value="{{ old('age') }}" required placeholder="Leeftijd van het huisdier">
                    @error('age')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kind">Soort</label>
                    <input type="text" id="kind" name="kind" required placeholder="kies uit: Hond, kat, vogel, reptiel, konijn, hamster, kikker of anders">
                    @error('kind')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="payment">Uurtarief (€)</label>
                    <input type="number" id="payment" name="payment" value="{{ old('payment') }}" step="0.01" required placeholder="Uurtarief in euro's">
                    @error('payment')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="durationInHours">Duur (uren)</label>
                    <input type="number" id="durationInHours" name="durationInHours" value="{{ old('durationInHours') }}" required placeholder="Aantal uren oppas">
                    @error('durationInHours')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="note">Beschrijving</label>
                    <textarea id="note" name="note" placeholder="Notitie over het huisdier (optioneel)">{{ old('note') }}</textarea>
                    @error('note')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="media">Foto's van het huisdier</label>
                    <input type="file" id="media" name="media" accept="image/*">
                    @error('media')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="cta-button">Opslaan</button>
            </form>
        </div>
    </main>
</body>
</html>
