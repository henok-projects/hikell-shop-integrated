<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idol_round;
use App\Models\Idol;

class IdolRoundController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'round_name' => 'required',
            'idol_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $idol = Idol_round::create([
            'idol_id'       => $request->idol_id,
            'name'          => $request->round_name,
            'start_date'    => strtotime($request->start_date),
            'end_date'      => strtotime($request->end_date),
        ]);

        if ($idol)
            return redirect()->back();
    }

    static function getLatestRound()
    {
        $latestIdol = Idol::latest()->first();
       
        $idolRound = $latestIdol ? Idol_round::where('idol_id', $latestIdol->id)->latest()->first() : null;
        return $idolRound;
    }
}
