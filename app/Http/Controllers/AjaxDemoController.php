<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AjaxDemoController extends Controller
{
    public function index()
    {
        $data['users'] = User::getUsers();
        return view('ajax.index', $data);
    }

    public function store()
    {
        $result = User::addUser();
        return [
            'msg' => $result->name . ' added successfully'
        ];
    }

    public function update($id)
    {
        User::updateUser($id);
    }

    public function getUsersList()
    {
        $data['users'] = User::getUsers();
        return view('ajax.ajax_table_partial', $data);
    }

}
