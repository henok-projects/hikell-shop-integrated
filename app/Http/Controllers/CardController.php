<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Card;
use App\Events\VoteUpdated;

class CardController extends Controller
{
    public function leaderboard()
    {
        return User::all(['user_id',  'votes']);
    }
    public function show(Card $card)
    {
        $user = auth()->user();
        $user->update([
            'score' => $user->votes + $card->value
        ]);

        event(new VoteUpdated($user));

        return redirect()->back()->withValue($card->value);
    }
}
