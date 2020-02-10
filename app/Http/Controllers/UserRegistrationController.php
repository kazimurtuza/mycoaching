<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        if(Auth::user()->role=='Admin')
        {
        return view('admin.user.registration');
        }
        else{
            return redirect('\home');
        }
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
        if(Auth::user()->role=='Admin')
        {
            $users=User::all();
            return view('admin.user.user-list',['users'=>$users]);
        }
        else{
            return redirect('\home');
        }


    }
    public function userprofile($userid)
    {
        $user=User::find($userid);
         return view('admin.user.user-profile',['user'=>$user]);
       
    }
  
 
    public function changeuserinfo($id)
    {
        $user=user::find($id);
        return view('admin.user.change-user-info',['user'=>$user]);
        
       
    }
    public function  updateUserInfo(Request $request)
    {
        $this->validate($request,[
            'name'=>'string|max:255',
            'mobile'=>'string|max:13|min:13',
            'email'=>'string|email|max:255',
        ]);
        $user=user::find($request->id);
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->save();
     
        return redirect("user-profiel/$request->id")->with('message',"update success");
       
    }
   
   
}
