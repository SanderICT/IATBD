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

        <section class="available-pets">
            <h2>Huizen op zoek naar Huisdieren</h2>
            

            <!-- Huisdieren Overzicht -->
            <div class="pet-list">
                @foreach ($animals as $animal)
                    <div class="pet-card">
                        <div class="pet-info">
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
