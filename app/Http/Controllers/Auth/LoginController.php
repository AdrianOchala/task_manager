<?php

namespace App\Http\Controllers\Auth;

use App\Data\Auth\LoginData;
use App\Http\Controllers\Controller;
use App\Http\Responses\EmptyResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginData $data)
    {
        if (Auth::attempt($data->only("email","password")->toArray(), $data->remember)) {
            session()->regenerate();

            return new EmptyResponse();
        }

        throw ValidationException::withMessages([
            'email' => trans('validation.custom.login_error'),
        ]);
    }
}
