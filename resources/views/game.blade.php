<h1 class="text-xl font-bold mb-4">Steen Papier Schaar</h1>

@if (!$game->player_one_choice || !$game->player_two_choice)
    <p>Het is jouw beurt, {{ $user->name }}!</p>

    @if (
        ($game->player_one_id == $user->id && !$game->player_one_choice) ||
        ($game->player_two_id == $user->id && !$game->player_two_choice)
    )
        <form method="POST" action="{{ route('games.choose', $game->id) }}">
            @csrf
            <button name="choice" value="rock">🪨 Steen</button>
            <button name="choice" value="paper">📄 Papier</button>
            <button name="choice" value="scissors">✂️ Schaar</button>
        </form>
    @else
        <p>Wachten op de andere speler...</p>
    @endif
@else
    <p><strong>Spel is afgelopen!</strong></p>
    <p>Speler 1 koos: {{ $game->player_one_choice }}</p>
    <p>Speler 2 koos: {{ $game->player_two_choice }}</p>
    <p><strong>Resultaat: {{ $game->result }}</strong></p>
@endif
