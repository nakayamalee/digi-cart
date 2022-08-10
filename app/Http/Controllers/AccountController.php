<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function change_name(Request $request)
    {
        $user = User::find($request->user_id);
        $user->name = $request->newName;
        $user->save();
        return true;
    }
}
