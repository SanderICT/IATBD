<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel Pagina</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-viewComponents.navbar />
    <h1>Mijn Profiel</h1>
    <h2>Mijn Huizen</h2>
    <main class="dier-oppasser-content">
        
        <!-- Display list of homes -->
        <section class="available-pets">
            
            
            @forelse ($houses as $home)
                <div class="pet-card">
                    <img src="{{ asset($home->media) }}" alt="home image" class="img-card">
                    <p><strong>Adres:</strong> {{ $home->address }}</p>
                    <p><strong>Stad:</strong> {{ $home->city }}</p>
                    <a href="{{ route('home.address', $home->address) }}" class="cta-button">Bekijk Details</a>
                </div>
            @empty
                <p>Je hebt nog geen huizen toegevoegd.</p>
            @endforelse
        </section>
    </main>
    <!-- Button to add a new home -->
    <a href="{{ route('home.create') }}" class="cta-button">Huis Toevoegen</a>
</body>
</html>
