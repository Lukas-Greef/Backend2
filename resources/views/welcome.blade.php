<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Steen, Papier, Schaar' }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col items-center justify-center min-h-screen p-6 lg:p-8">

<main class="flex flex-col-reverse lg:flex-row w-full max-w-[200px] lg:max-w-4xl">
    <div class="flex-1 p-6 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] text-sm leading-5 shadow-[inset_0_0_0_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0_0_0_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
        <h1 class="font-medium mb-1">Welkom!</h1>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">Veel speelplezier!</p>

        <ul class="space-y-2 mb-6">
            <li>
                <a href="{{ route('login') }}" target="_blank" class="underline text-[#f53003] dark:text-[#FF4433] flex items-center gap-1">
                    Login
                    <svg class="w-2.5 h-2.5" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.7 7V2.8H3.5M2.5 8L7.5 3" stroke="currentColor" stroke-linecap="square" />
                    </svg>
                </a>
            </li>
            <li>
                <span>Heb je nog geen account?</span>
                <a href="/registreer" target="_blank" class="underline text-[#f53003] dark:text-[#FF4433] flex items-center gap-1 ml-1">
                    Registreer
                    <svg class="w-2.5 h-2.5" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.7 7V2.8H3.5M2.5 8L7.5 3" stroke="currentColor" stroke-linecap="square" />
                    </svg>
                </a>
            </li>
        </ul>

        <a href="https://laravel.com" target="_blank" class="inline-block px-5 py-1.5 bg-[#1b1b18] text-white border border-black rounded-sm hover:bg-black dark:bg-[#eeeeec] dark:text-[#1C1C1A] dark:border-[#eeeeec] dark:hover:bg-white dark:hover:border-white">
            Start nu
        </a>
    </div>
</main>

@if (Route::has('login'))
    <div class="hidden lg:block h-14.5"></div>
@endif
</body>
