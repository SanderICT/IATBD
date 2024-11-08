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
            <h2>Filteren</h2>
            <form method="GET" action="{{ route('dier-oppasser') }}">
                <div class="filter-group">
                    <label>Soort Dier</label>
                    @php
                        $selectedTypes = request()->get('animal_type') ?? [];
                    @endphp
                    <div>
                        <input type="checkbox" name="animal_type[]" value="dog" id="dog" 
                               {{ in_array('dog', (array) $selectedTypes) ? 'checked' : '' }}>
                        <label for="dog">Hond</label>
                    </div>
                    <div>
                        <input type="checkbox" name="animal_type[]" value="cat" id="cat" 
                               {{ in_array('cat', (array) $selectedTypes) ? 'checked' : '' }}>
                        <label for="cat">Kat</label>
                    </div>
                    <div>
                        <input type="checkbox" name="animal_type[]" value="bird" id="bird" 
                               {{ in_array('bird', (array) $selectedTypes) ? 'checked' : '' }}>
                        <label for="bird">Vogel</label>
                    </div>
                    <div>
                        <input type="checkbox" name="animal_type[]" value="other" id="other" 
                               {{ in_array('other', (array) $selectedTypes) ? 'checked' : '' }}>
                        <label for="other">Anders</label>
                    </div>
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
                            <img src="{{ ucfirst($animal->media) }}" class="img-card" alt="pet">
                            <h3>{{ $animal->name }}</h3>
                            <p><strong>Soort:</strong> {{ ucfirst($animal->kind) }}</p>
                            <p><strong>oppastijd:</strong> {{ $animal->durationInHours }} uur</p>
                            <p><strong>uurtarief:</strong> ${{ $animal->payment }},-</p>
                            <p><strong>Notitie:</strong> {{ $animal->note }}</p>
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
