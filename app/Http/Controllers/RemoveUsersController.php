<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RemoveContentController;
use App\Models\RemoveContent;
use App\Models\User;

class RemoveUsersController extends Controller
{
    public function delete($id){
        RemoveContentController::delete();

        User::where('user_id',$id)->delete();
        // Auth::{{asset('js/jquery.min.js')}}();
        return redirect('/');
    }
}
