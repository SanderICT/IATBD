<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Huisdieren</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-viewComponents.navbar />
    <main class="dier-oppasser-content">
        <section class="available-pets">
            <h1>Mijn Huisdieren</h1>

            <a href="{{ route('maakHuisdier') }}" class="cta-button">Nieuw Huisdier Toevoegen</a>

            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <div class="pet-list">
                @foreach ($animals as $animal)
                    <div class="pet-card">
                        <!-- Toon de afbeelding van het huisdier -->
                        <div class="img-card">
                            <img src="{{ asset( $animal->media) }}" alt="Foto van {{ $animal->name }}" class="img-card">
                        </div>

                        <h3>{{ $animal->name }}</h3>
                        <p><strong>Soort:</strong> {{ ucfirst($animal->kind) }}</p>
                        <p><strong>Leeftijd:</strong> {{ $animal->age }} jaar</p>
                        <p><strong>Tarief:</strong> €{{ number_format($animal->payment, 2) }} per uur</p>
                        <p><strong>Duur:</strong> {{ $animal->durationInHours }} uur</p>
                        <p><strong>Beschrijving:</strong> {{ $animal->note }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
