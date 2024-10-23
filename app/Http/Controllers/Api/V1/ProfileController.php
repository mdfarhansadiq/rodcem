<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function profile()
    {
        try {
            return new ProfileResource(auth()->user());
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}