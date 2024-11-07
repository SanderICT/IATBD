<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassenOpJeDier - Zoeken naar Oppas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigatiebalk -->
    <x-viewComponents.navbar />

    <!-- Hoofdinhoud -->
    <main class="dier-oppasser-content">
        <section class="filters">
            <h2>Zoekopdracht Filteren</h2>
            <form method="GET" action="{{ route('dier-oppasser') }}">
                <div class="filter-group">
                    <label for="animal_type">Soort Dier</label>
                    <select name="animal_type" id="animal_type">
                        <option value="">Alle Soorten</option>
                        <option value="dog">Hond</option>
                        <option value="cat">Kat</option>
                        <option value="bird">Vogel</option>
                        <option value="other">Anders</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="location">Locatie</label>
                    <input type="text" name="location" id="location" placeholder="Voer locatie in">
                </div>
                <div class="filter-group">
                    <label for="date">Beschikbaarheid</label>
                    <input type="date" name="date" id="date">
                </div>
                <button type="submit" class="cta-button">Filteren</button>
            </form>
        </section>

        <section class="available-pets">
            <h2>Huisdieren op zoek naar een Oppas</h2>
            

            <!-- Huisdieren Overzicht -->
            <div class="pet-list">
                @foreach ($animals as $animal)
                    <div class="pet-card">
                        <div class="pet-info">
                            <img src="<?= ucfirst($animal->media); ?>" class="img-card" alt="pet">
                            <h3>{{ $animal->name }}</h3> <!-- Gebruik hier $animal, niet $pet -->
                            <p><strong>Soort:</strong> {{ ucfirst($animal->kind) }}</p> <!-- Gebruik $animal->kind -->
                            <p><strong>oppastijd:</strong> {{ $animal->durationInHours }} uur</p>
                            <p><strong>uurtarief:</strong> ${{ $animal->payment }},-</p> <!-- Gebruik $animal->location -->
                            <p><strong>Notitie:</strong> {{ $animal->note }}</p> <!-- Gebruik $animal->note -->
                        </div>
                        <div class="pet-actions">
                            <a href="{{ route('animal.animalID', $animal->animalID) }}" class="cta-button">Bekijk Details</a> 
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
