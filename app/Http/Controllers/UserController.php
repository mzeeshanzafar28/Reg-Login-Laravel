<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Laracasts\Flash\Flash;
use App\Jobs\JobForMail;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // if(!$request->name){
        //     $request->session()->flash('message', 'This is a message from Flash');
        //     return redirect()->back();
        // }
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
            $user = new UserModel();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

        $code = rand(111111, 999999);
        $request->session()->put('verification_code', $code);
        $request->session()->put('user_email', $user->email);
        $request->session()->put('user_id', $user->id);
        $data = [
            'code' => $code,
            'subject' => 'Verify Your Email',
            'user_id' =>  $user->id,
            'email' => $user->email
        ];
        dispatch(new JobForMail($data));
           

            return view('/verifyPage')->with('verify_now',"success, please enter the 6-digit code sent to your email");
            
        }
        
        public function VerifyNow(Request $request){
           if($request->session()->get('verification_code') && $request->session()->get('user_email')){
            return view('verifyPage');
        }else{
            return redirect('/login');
        }
    }

        public function var(Request $request)
        {
            $request->validate([
                'verify' => 'required',
            ]);
            $code = $request->session()->get('verification_code');
            if($code == $request->verify){
                $userId = $request->session()->get('user_id');
                $user = UserModel::find($userId);
                $user->verified_at = Carbon::now();
                $user->save();
                $request->session()->flush();
                // $request->session()->flash('success_message', 'Verified Successfully! Login Now');
                return redirect('login');
            }else{
                // $request->session()->flash('message', 'Invalid verification code.');
                echo "Invalid Code bc";
                // return redirect('/verifyPage');
            }
        }

    
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        // $user = UserModel::where('email', $request->email)->first()->name;
        return redirect()->intended('/dashboard');
    }

    return redirect('/login')->with('no_match', 'Invalid Credentials');
    }

    public function out()
    {
        auth()->logout();
        return redirect('/login')->with('logout_success', 'You have been logged out');
    }
}
