<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    //
    public function index()
    {
        session()->flush();
        return view('login');
    }
    public function log(Request $request)
    {
        $user = DB::table('users')->where('username', $request->input('username'))->first();
        if ($user != NULL) {
            if ($user->password == md5($request->input('password'))) {
                session(['user' => $user]);
                switch ($user->role) {
                    case 'Admin':
                        return redirect()->route('home');
                        break;
                    case 'User':
                        return redirect()->route('home');
                        break;
                }
            } else {
                echo 'Password salah kids';
            }
        } else {
            echo 'Username gk ada kids';
        }
    }
    public function register()
    {
        return view('register');
    }
    public function reg()
    {
        $user = DB::table('users')->where('username', $_POST['username'])->first();
        if($user == null){
            DB::table('users')->insert([
                'username' => $_POST['username'],
                'password' => md5($_POST['password']),
                'email' => $_POST['email'],
                'role' => $_POST['role']
            ]);
            return redirect()->route('login.index');
        }else{
            echo 'Username sudah digunakan';
        }
    }
    public function home()
    {
        if (session('user') != null) {
            return view('home');
        } else {
            return redirect()->route('login.index');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login.index');
    }
}
