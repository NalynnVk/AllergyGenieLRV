<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $name }}</p>
    <h2>Allergens:</h2>
    <ul>
        @foreach ($allergens as $allergen)
            <li>{{ $allergen }}</li>
        @endforeach
    </ul>

    <h2>Severities:</h2>
    <ul>
        @foreach ($severities as $severity)
            <li>{{ $severity }}</li>
        @endforeach
    </ul>

   
</body>
</html>
