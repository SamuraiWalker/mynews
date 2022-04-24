<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profiles;

class ProfileController extends Controller
{
    //PHP/Laravel08 ControllerとRoutingとの関係について 課題５
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
    // 以下を追記
        // Varidationを行う
        $this->validate($request, Profiles::$rules);
        
        $profiles = new Profiles;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profiles->fill($form);
        $profiles->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    
}
