<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\CreateApiToken;
use App\Data\Auth\TokenData;
use App\Http\Responses\WrappedResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TokenResource;
use Illuminate\Validation\ValidationException;

class GetTokenController
{
    public function __invoke(TokenData $data): WrappedResponse
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
