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
                @foreach ($home as $home)
                    <div class="pet-card">
                        <div class="pet-info">
                            <img src="<?= ucfirst($home->media); ?>" class="img-card" alt="home">

                            <p><strong>stad:</strong> {{ $home->city }}</p>
                            <p><strong>address:</strong> {{ $home->address }}</p> 
                            
                        </div>
                        <div class="pet-actions">
                            <a href="{{ route('home.address', $home->address) }}" class="cta-button">Bekijk Details</a> 
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

</body>
</html>
