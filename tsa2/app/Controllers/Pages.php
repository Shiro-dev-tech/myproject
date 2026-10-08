<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    public function profile()
    {
        $userModel = new UserModel();

        $user = $userModel->first();

        return view('profile', ['user' => $user]);
    }

    public function about()
    {
        return view('about');
    }
}