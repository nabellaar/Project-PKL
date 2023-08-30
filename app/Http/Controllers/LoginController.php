<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            dd(Auth::user()->role);
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->intended('/');
            }
            
        }
 
        return back()->with('loginError', 'Login failed');
    }
 

}