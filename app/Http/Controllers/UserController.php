<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function login()
    {
        return view('users.login');
    }
}
