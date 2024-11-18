<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Publishing Site</title>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMN7IkV2Z91GZl9y9qMEAm12VGlA5hwAZ6gGmMu" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
        .nav-link {
            @apply text-white px-3 py-2 rounded-md text-sm font-medium;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

   @include('layouts.navigation')
   @include('blogs/index')
   @include('layouts.footer')
    
</body>
</html>
