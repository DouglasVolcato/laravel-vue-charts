<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <title>Gráficos</title>
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div id="app">
            <total-cnae-consume-charts-page></total-cnae-consume-charts-page>
        </div>
    </body>
</html>
