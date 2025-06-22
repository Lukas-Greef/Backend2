<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Services\GameService;

class GameController extends Controller
{
    protected GameService $gameService;

    // Dependency injection van GameService
    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    // Laat de lobby zien met alle games/lobby’s
    public function dashboard()
    {
        $games = Game::whereNull('player_two_id')->orWhereNull('player_one_id')->get();
        return view('dashboard', compact('games'));
    }

    // Maak een nieuwe game/lobby aan
    public function createGame()
    {
        $game = $this->gameService->createGame();

        return redirect()->route('games.play', $game->id);
    }

    // Join een bestaande game/lobby
    public function joinGame(Game $game)
    {
        if ($this->gameService->joinGame($game)) {
            return redirect()->route('games.play', $game->id);
        }

        return redirect()->route('dashboard')->with('error', 'Kan niet joinen.');
    }

    // Spelscherm tonen
    public function play(Game $game)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        return view('game', compact('game', 'user'));
    }

    // Spelkeuze opslaan
    public function submitChoice(Request $request, Game $game)
    {
        $choice = $request->input('choice');

        $this->gameService->submitChoice($game, $choice);

        return redirect()->route('games.play', $game->id);
    }
}
