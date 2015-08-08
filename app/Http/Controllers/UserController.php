<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {

    }

    public function index() {

        $users = User::all();

        return $this->response->array($users);
    }

    public function show($id) {

        $user = User::find($id);

        return $this->response->array($user);
    }
}
