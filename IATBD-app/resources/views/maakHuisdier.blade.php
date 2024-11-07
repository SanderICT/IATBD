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

            <form action="{{ route('huisdieren.store') }}" method="POST" class="pet-form">
                @csrf

                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" id="name" name="name" required placeholder="Naam van het huisdier">
                </div>

                <div class="form-group">
                    <label for="age">Leeftijd</label>
                    <input type="number" id="age" name="age" required placeholder="Leeftijd van het huisdier">
                </div>

                <div class="form-group">
                    <label for="kind">Soort</label>
                    <input type="text" id="kind" name="kind" required placeholder="Soort dier (bijv. hond, kat)">
                </div>

                <div class="form-group">
                    <label for="payment">Uurtarief (€)</label>
                    <input type="number" id="payment" name="payment" step="0.01" required placeholder="Uurtarief in euro's">
                </div>

                <div class="form-group">
                    <label for="durationInHours">Duur (uren)</label>
                    <input type="number" id="durationInHours" name="durationInHours" required placeholder="Aantal uren oppas">
                </div>

                <div class="form-group">
                    <label for="note">Beschrijving</label>
                    <textarea id="note" name="note" placeholder="Notitie over het huisdier (optioneel)"></textarea>
                </div>

                <button type="submit" class="cta-button">Opslaan</button>
            </form>
        </div>
    </main>
</body>
</html>
