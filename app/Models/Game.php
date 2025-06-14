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

    public function isFinished()
    {
        return $this->player_one_choice && $this->player_two_choice;
    }
}
