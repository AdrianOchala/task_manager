<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\CreateApiToken;
use App\Data\Auth\TokenData;
use App\Http\Controllers\Controller;
use App\Http\Resources\TokenResource;
use App\Http\Responses\WrappedResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TokenData $data)
    {
        $user = User::query()->where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password))
        {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $token = new CreateApiToken($user, $data->device)->execute();

        return new WrappedResponse(new TokenResource($token));
    }
}
