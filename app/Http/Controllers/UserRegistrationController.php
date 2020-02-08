<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.user.registration');
    }
    public function usersave(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());

        $users=User::all();
        return view('admin.user.user-list',['users'=>$users]);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:13','max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function userlist()
    {
        $users=User::all();
        return view('admin.user.user-list',['users'=>$users]);

    }
}
