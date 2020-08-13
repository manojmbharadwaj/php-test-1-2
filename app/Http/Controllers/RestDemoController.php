<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RestDemoController extends Controller
{
    public function index()
    {
        return User::getUsersList();
    }
}
