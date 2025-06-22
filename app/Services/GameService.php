<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameService
{
    /**
     * Maak een nieuwe game/lobby aan voor de ingelogde gebruiker.
     *
     * @return Game
     */
    public function createGame(): Game
    {
        return Game::create([
            'player_one_id' => Auth::id(),
        ]);
    }

    /**
     * Laat een gebruiker joinen aan een bestaande game/lobby.
     *
     * @param Game $game
     * @return bool
     */
    public function joinGame(Game $game): bool
    {
        // Controleer of er plek is en dat de speler niet al player_one is
        if (!$game->player_two_id && $game->player_one_id != Auth::id()) {
            $game->player_two_id = Auth::id();
            $game->save();
            return true;
        }

        return false;
    }

    /**
     * Verwerk de keuze van de speler en bepaal de winnaar indien mogelijk.
     *
     * @param Game $game
     * @param string $choice
     * @return void
     */
    public function submitChoice(Game $game, string $choice): void
    {
        $user = Auth::user();

        // Sla de keuze op afhankelijk van de speler
        if ($game->player_one_id == $user->id) {
            $game->player_one_choice = $choice;
        } elseif ($game->player_two_id == $user->id) {
            $game->player_two_choice = $choice;
        }

        // Als beide spelers gekozen hebben, bepaal dan de winnaar
        if ($game->player_one_choice && $game->player_two_choice) {
            $game->result = $game->determineWinner();
        }

        $game->save();
    }
}
