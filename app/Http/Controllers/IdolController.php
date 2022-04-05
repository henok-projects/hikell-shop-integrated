<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Idol;


class IdolController extends Controller
{
    public function index()
    {
        $idols = Idol::all();
        return view('admin_panel.hgt.index', compact('idols'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idol_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $idol = Idol::create([
            'name'          => $request->idol_name,
            'start_date'    => strtotime($request->start_date),
            'end_date'      => strtotime($request->end_date),
        ]);

        if ($idol)
            return redirect()->back();
    }

    public function show($idol)
    {
        $idol = Idol::find($idol);
        if ($idol)
            $idol = $idol->with('rounds')->first();
        return view('admin_panel.hgt.idol', compact('idol'));
    }
}
