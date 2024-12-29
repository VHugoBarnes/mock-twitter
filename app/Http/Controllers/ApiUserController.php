<?php

namespace App\Http\Controllers;

use App\Models\ApiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    public function created(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $apiUser = ApiUser::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'rate_limit' => 100,
            'status' => 'active',
        ]);

        $token = $apiUser->createToken('api_token', ['api:access'])->plainTextToken;

        # Update api user `api_token` field with the generated token
        $apiUser->api_token = $token;

        return response()->json([
            'user' => $apiUser,
            'token' => $token
        ], 201);
    }
}
