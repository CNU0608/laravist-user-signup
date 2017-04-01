<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSignUpRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(UserSignUpRequest $request){
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ];

        User::register($data);
        
        return redirect('/success');
    }
}