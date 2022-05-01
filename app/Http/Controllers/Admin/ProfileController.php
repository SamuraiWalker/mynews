<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

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
        $this->validate($request, Profile::$rules);
        
        $profiles = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profiles->fill($form);
        $profiles->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        // Profiles Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit',['profile_form' =>$profile]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profiles_form = $request->all();
        
        unset($profiles_form['_token']);
        unset($profiles_form['remove']);
        unset($profiles_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profiles_form)->save();
        // \Debugbar::info('test' . get_class(new History()));
        // Laravel17 以下を追記
        $profileHistory = new ProfileHistory();
        // dd($profileHistory);
        $profileHistory->profile_id = $profile->id;
        $profileHistory->edited_at = carbon::now();
        $profileHistory->save();
        return redirect('admin/profile/edit?id=' . $profile->id);
    }
    
    
}
