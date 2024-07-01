<!-- resources/views/weather/teste.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Previsão do Tempo</title>
</head>
<body>
    <h1>Previsão do Tempo</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('getWeatherByLocation') }}" method="POST">
        @csrf
        <label for="location">Localização:</label>
        <input type="text" id="location" name="location" required>
        <button type="submit">Buscar</button>
    </form>

    @if (isset($weatherData))
        <h2>Previsão do tempo para {{ $location }}</h2>
        <p><strong>Localização:</strong> {{ $weatherData['name'] }}</p>
        <p>Temperatura: {{ $weatherData['main']['temp'] }}°C</p>
        <!-- Exibir outros dados do tempo, se necessário -->
    @endif
</body>
</html>
