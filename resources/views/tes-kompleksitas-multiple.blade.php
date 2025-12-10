<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Kompleksitas Multiple</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1>Test Kompleksitas Multiple</h1>
        <form action="{{ route('tes-kompleksitas.multiple') }}" method="GET">
            <label for="n">Ukuran Input (n):</label>
            <input type="number" name="n" id="n" value="{{ old('n', request('n')) ?? 2000 }}">
            <button type="submit">Analyze</button>
        </form>
        <h2>Hasil Analisis</h2>
        <p>Ukuran Input (n): {{ $n }}</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kompleksitas</th>
                    <th>Waktu (ms)</th>
                    <th>Memori (KB)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>O(1)</td>
                    <td>{{ $O1['time_ms'] ?? '-' }}</td>
                    <td>{{ $O1['memory_kb'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td>O(n)</td>
                    <td>{{ $On['time_ms'] ?? '-' }}</td>
                    <td>{{ $On['memory_kb'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td>O(n2)</td>
                    <td>{{ $On2['time_ms'] ?? '-' }}</td>
                    <td>{{ $On2['memory_kb'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td>O(log n)</td>
                    <td>{{ $Ologn['time_ms'] ?? '-' }}</td>
                    <td>{{ $Ologn['memory_kb'] ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
