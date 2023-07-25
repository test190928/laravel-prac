<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;

class RegisterController extends Controller
{
    //
    use RegistersUsers;

    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * 新規登録ページ表示
     * @return void
     */
    public function showRegister(){
        return view('/login/register');
    }

    /**
     * 新規登録処理
     * @param Request $request
     * @return void
     */
    public function register(Request $request){
        $data = $request->input();
        //バリデーション
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);
        if($validator->fails()){
            return redirect('showRegister')->withErrors($validator)->withInput();
        }
        $this->create($data);
        return redirect()->route('showLogin')->with('register','新規登録しました');
    }
}
