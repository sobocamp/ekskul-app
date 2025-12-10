<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Kompleksitas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1>Test Kompleksitas</h1>
        <form action="{{ route('tes-kompleksitas') }}" method="GET">
            <label for="n">Ukuran Input (n):</label>
            <input type="number" name="n" id="n" value="{{ old('n', request('n')) ?? 10000 }}">
            <button type="submit">Analyze</button>
        </form>
        <h2>Hasil Analisis</h2>
        <p>Ukuran Input (n): {{ $input_n }}</p>
        <p>Hasil: {{ $result }}</p>
        <p>Waktu (ms): {{ $time_ms }}</p>
        <p>Memori (KB): {{ $memory_kb }}</p>
        <p>Kompleksitas Waktu: {{ $estimated_complexity }}</p>
    </div>
</body>

</html>
