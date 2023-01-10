<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Login2Controller extends Controller
{
    //  Start Test multiple Auth
    public function showLogin2()
    {
        return view('auth.login2');
    }

    public function postLogin2()
    {
        $acceptFields = [
            'email',
            'password'
        ];

        $user2 = Arr::only(request()->all(), $acceptFields);

        if (Auth::guard('user2')->attempt($user2)) {
            dd('true', Auth::guard('user2')->user()->id);
        } else {
            dd('false', Auth::user()->id);
        }
    }
    //  End Test multiple Auth

    //  Start Relationship
    public function listUser(Request $request)
    {
        $data['listUser'] = User::find(1)->profile;
        return view('testview', $data);
    }
    //  End Relationship
}
