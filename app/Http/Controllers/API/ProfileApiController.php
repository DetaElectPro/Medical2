<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
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

    public function updateFCM(Request $request)
    {
        $user = auth('api')->user();
        if ($user) {
            $userModel = User::find($user->id);
            $userModel->fcm_registration_id = $request->fcm_registration_id;
            $userModel->save();
            return response()->json(['status' => true, 'user' => $userModel]);
        }
        return response()->json(['status' => false]);
    }
}
