<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="/src/styles.css" rel="stylesheet">

    {{-- <link href="{{ mix('css/styles.css') }}" rel="stylesheet"> --}}
    @routes
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @inertiaHead
</head>

<body class=" bg-white
     dark:bg-gray-400 text-grey-800 dark:text-gray-300 ">


    <div
        class="flex
                    items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow
                    starting:opacity-0">

    </div>
    @inertia

</body>

</html>
