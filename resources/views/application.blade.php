<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"/>
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}"/>
</head>
<body>
<div id="app"></div>
</body>
<script src="{{ asset(mix('js/app.js')) }}"></script>
</html>
