<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //PHP/Laravel08 ControllerとRoutingとの関係について 課題５
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create()
    {
        return redirect('admin.profile.create');
    }
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        return redirect('admin.profile.edit');
    }
}
