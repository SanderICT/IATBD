<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $home->address }} - Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-viewComponents.navbar />
    <main class="home-details">
        <section class="home-wrapper">
            <h1>{{ $home->address }}, {{ $home->city }}</h1>
            
            <div class="image-gallery">
                @foreach ($media as $item)
                    <img src="{{ asset($item->media) }}" alt="Afbeelding van {{ $home->address }}" class="img-detail">
                @endforeach
            </div>

            <!-- Als er geen media is -->
            @if($media->isEmpty())
                <p>Geen afbeeldingen beschikbaar voor deze locatie.</p>
            @endif





            <div>
                <p><strong>Eigenaar:</strong> {{ $home->owner}}</p>
                <p><strong>Beschikbaarheid:</strong> {{ $home->availability ? 'Beschikbaar' : 'Niet beschikbaar' }}</p>
            </div>
        </section>
    </main>
</body>
</html>
