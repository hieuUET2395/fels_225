<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow(User $user)
    {
        Auth::user()->follows()->toggle($user->id);

        return response()->json(['status' => 'success']);
    }
}