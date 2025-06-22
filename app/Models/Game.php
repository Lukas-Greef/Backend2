<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'player_one_id',
        'player_two_id',
        'player_one_choice',
        'player_two_choice',
        'result',
    ];

    public function isFinished(): bool
    {
        return (bool) ($this->player_one_choice && $this->player_two_choice);
    }

    // bepaal de winnaar van het spel
    public function determineWinner(): string
    {
        if ($this->player_one_choice === $this->player_two_choice) {
            return 'Gelijkspel';
        }

        return match ([$this->player_one_choice, $this->player_two_choice]) {
            ['rock', 'scissors'], ['paper', 'rock'], ['scissors', 'paper'] => 'Speler 1 wint',
            default => 'Speler 2 wint',
        };
    }
}
