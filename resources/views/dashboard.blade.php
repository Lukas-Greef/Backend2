@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Lobby's / Games</h1>

        <form action="{{ route('games.create') }}" method="POST" class="mb-6 text-center">
            @csrf
            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition"
            >
                Nieuwe game aanmaken
            </button>
        </form>

        @if($games->count())
            <ul class="space-y-4">
                @foreach($games as $game)
                    <li class="flex justify-between items-center p-4 border rounded shadow-sm hover:shadow-md transition">
                        <span class="font-semibold">Game #{{ $game->id }}</span>

                        @if($game->player_one_id != auth()->id())
                            <form action="{{ route('games.join', $game->id) }}" method="POST" class="inline">
                                @csrf
                                <button
                                    type="submit"
                                    class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600 transition"
                                >
                                    Join game
                                </button>
                            </form>
                        @else
                            <span class="italic text-gray-600">(Je hebt deze game aangemaakt)</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-gray-500 mt-8">Geen lobby's beschikbaar. Maak er een aan!</p>
        @endif
    </div>
@endsection
