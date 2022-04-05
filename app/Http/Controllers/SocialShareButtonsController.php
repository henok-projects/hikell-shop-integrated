<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{

    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            '/watch/{video_id}',
            'Hikell.com',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

        return view('posts', compact('shareComponent'));
    }

}
