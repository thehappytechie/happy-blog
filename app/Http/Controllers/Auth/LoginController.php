<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user) {
        $user->last_login_at = date('Y-m-d H:i:s');
        $user->save();
    }
}
