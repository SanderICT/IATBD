<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $animal->name }} - Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-viewComponents.navbar />
    <main class="animal-details">
        <section class="animal-wrapper">
            <img src="{{ ucfirst($animal->media) }}" alt="{{ $animal->name }} foto" class="img-detail">
            <div>
                <h1>{{ $animal->name }}</h1>
                <p><strong>Soort:</strong> {{ ucfirst($animal->kind) }}</p>
                <p><strong>Leeftijd:</strong> {{ $animal->age }} jaar</p>
                <p><strong>Oppastijd:</strong> {{ $animal->durationInHours }} uur</p>
                <p><strong>Uurtarief:</strong> ${{ $animal->payment }},-</p>
                <p><strong>Eigenaar:</strong> {{ $animal->owner }}</p>
                <p><strong>Notitie:</strong> {{ $animal->note }}</p>
                @if(session('status'))
                    <p class="status">{{ session('status') }}</p>
                @endif

                <!-- Knop om als oppas te reageren -->
                <form action="{{ route('animal.reageren', $animal->animalID) }}" method="POST">
                    @csrf
                    <button type="submit" class="cta-button">Reageren als Oppas</button>
                </form>
            </div>
        </section>
        

        <!-- Recensies sectie -->
        @if($animal->reviews->count() > 0)
            <section class="reviews">
                <h2>Recensies</h2>
                @foreach($animal->reviews as $review)
                    <div class="review">
                        <p><strong>Beoordeling:</strong> {{ $review->rating }} sterren</p>
                        <p><strong>Recensie:</strong> {{ $review->review }}</p>
                    </div>
                @endforeach
            </section>
        @else
            <p>Er zijn nog geen recensies voor dit dier.</p>
        @endif
    </main>
</body>
</html>
