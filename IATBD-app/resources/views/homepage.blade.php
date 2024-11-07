<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassenOpJeDier - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigatiebalk -->
    <x-viewComponents.navbar />

    <!-- Hoofdinhoud -->
    <main class="dashboard-content">
        <section class="intro">
            <h1>Welkom bij PassenOpJeDier!</h1>
            <p>Maak een keuze: zoek een veilig oppashuis voor je huisdier of voeg je huisdier toe voor een oppas.</p>
        </section>

        <!-- Actiekaarten -->
        <section class="action-cards">
            <div class="action-card">
                <h2>Zoek een Oppashuis</h2>
                <p>Bekijk beschikbare huizen waar jouw huisdier welkom is voor een oppas.</p>
                <a href="/find-houses" class="cta-button">Bekijk Oppashuizen</a>
            </div>

            <div class="action-card">
                <h2>Voeg Je Huisdier Toe</h2>
                <p>Plaats een zoekopdracht voor een oppas voor jouw huisdier met alle nodige informatie.</p>
                <a href="{{ route('maakHuisdier') }}" class="cta-button">Huisdier Toevoegen</a>

            </div>

            <!-- Nieuwe knop die naar dier-oppasser pagina leidt -->
            <div class="action-card">
                <h2>Bekijk Huisdieren op zoek naar een Oppas</h2>
                <p>Bekijk alle huisdieren die op zoek zijn naar een oppas.</p>
                <a href="/dier-oppasser" class="cta-button">Bekijk Huisdieren</a>
            </div>
        </section>

        <!-- Extra functies -->
        <section class="features">
            <div class="feature">
                <h3>Oppassers Profielen</h3>
                <p>Bekijk profielen van betrouwbare oppassers, compleet met foto's en video's.</p>
            </div>
            <div class="feature">
                <h3>Reviews en Beoordelingen</h3>
                <p>Lees beoordelingen van eerdere oppassers om de beste keuze te maken voor jouw huisdier.</p>
            </div>
        </section>
    </main>
</body>
</html>
