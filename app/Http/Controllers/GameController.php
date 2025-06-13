<?php
namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
// Laat de lobby zien met alle games/lobby’s
    public function dashboard()
    {
        $games = Game::whereNull('player_two_id')->orWhereNull('player_one_id')->get();
        return view('dashboard', compact('games'));
    }

// Maak een nieuwe game/lobby aan
public function createGame()
{
   $game = Game::create([
       'player_one_id' => Auth::id(),
   ]);

   return redirect()->route('games.play', $game->id);
}


// Join een bestaande game/lobby
public function joinGame(Game $game)
{
if (!$game->player_two_id && $game->player_one_id != Auth::id()) {
$game->player_two_id = Auth::id();
$game->save();
return redirect()->route('games.play', $game->id);
}

return redirect()->route('dashboard')->with('error', 'Kan niet joinen.');
}

// Spelscherm tonen
public function play(Game $game)
{
$user = Auth::user();

return view('game', compact('game', 'user'));
}

// Spelkeuze opslaan
public function submitChoice(Request $request, Game $game)
{
$choice = $request->input('choice');
$user = Auth::user();

if ($game->player_one_id == $user->id) {
$game->player_one_choice = $choice;
} elseif ($game->player_two_id == $user->id) {
$game->player_two_choice = $choice;
}

// Bepaal winnaar als beide hebben gekozen
if ($game->player_one_choice && $game->player_two_choice) {
$game->result = $this->determineWinner($game->player_one_choice, $game->player_two_choice);
}

$game->save();

return redirect()->route('games.play', $game->id);
}

private function determineWinner($p1, $p2)
{
if ($p1 === $p2) return 'Gelijkspel';

return match ([$p1, $p2]) {
['rock', 'scissors'], ['paper', 'rock'], ['scissors', 'paper'] => 'Speler 1 wint',
default => 'Speler 2 wint',
};
}
}
