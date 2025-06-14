@extends('layouts.app')

@section('content')
    <h1>Steen Papier Schaar</h1>

    @if(session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    @if (!$game->player_one_choice || !$game->player_two_choice)
        @if (
            // Speler 1: mag kiezen als hij nog niet gekozen heeft
            ($game->player_one_id == $user->id && !$game->player_one_choice)
            // Speler 2: mag kiezen als speler 1 al gekozen heeft en hijzelf nog niet
            || ($game->player_two_id == $user->id && $game->player_one_choice && !$game->player_two_choice)
        )
            <form action="{{ route('games.choice', $game->id) }}" method="POST">
                @csrf
                <select name="choice" required>
                    <option value="">Kies...</option>
                    <option value="rock">Steen</option>
                    <option value="paper">Papier</option>
                    <option value="scissors">Schaar</option>
                </select>
                <button type="submit">Indienen</button>
            </form>
        @else
            <p>Wachten op de andere speler...</p>
        @endif
    @else
        <p><strong>Resultaat: {{ $game->result }}</strong></p>
        <p>Speler 1 koos: {{ ucfirst($game->player_one_choice) }}</p>
        <p>Speler 2 koos: {{ ucfirst($game->player_two_choice) }}</p>
    @endif
@endsection
