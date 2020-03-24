<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{

    public function checkUser()
    {
        $user = auth('api')->user();
        if ($user) {
            return response()->json(['status' => true, 'user' => $user]);
        }
        return response()->json(['status' => false]);
    }
}
