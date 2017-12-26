<?php

namespace App\Http\Controllers\Account;

use App\Mail\Account\PasswordUpdate;
use App\Rules\CurrentPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function index()
    {
        return view('account.password.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'password_current' => ['required', new CurrentPassword()],
            'password' => 'required|string|min:6|confirmed',
        ]);

        Mail::to($request->user())->send(new PasswordUpdate());

        return redirect()->route('account.index');
    }
}
