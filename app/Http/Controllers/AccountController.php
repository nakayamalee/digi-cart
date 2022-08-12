<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function change_name(Request $request)
    {
        $account = User::find(Auth::user()->id);
        $account->name = $request->newName;
        $account->save();
        return 'true';
    }
}
