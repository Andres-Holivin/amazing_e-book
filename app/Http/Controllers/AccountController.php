<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AccountController extends Controller
{
    public function homePage(Request $request){
        return view('pages.index');
    }
    public function loginPage(){
        return view('pages.login');
    }
    public function registerPage(){
        return view('pages.register');
    }
    public function insertUser(Request $request){
        $credentials= $request->validate([
            'FirstName'=>['required','max:25','alpha'],
            'MiddelName'=>['sometimes','max:25','alpha'],
            'LastName'=>['required','max:25','alpha'],
            'Email'=>['required','email:dns','unique:users'],
            'Password'=>['required','min:8','alpha_num'],
            // 'imageFile'=>['required','mimes:jpg,png,jpeg,gif,svg','images'], -> error laravel
            'imageFile'=>['required'],
            'Role'=>['required'],
            'RadioBtn'=>['required'],
        ]);
        $imagePath=$this->saveFile($request);
        $user= new User;
        $user->first_name=$credentials['FirstName'];
        $user->middle_name=$credentials['MiddelName'];
        $user->last_name=$credentials['LastName'];
        $user->email=$credentials['Email'];
        $user->display_picture_link=$imagePath;
        $user->delete_flag=0;
        $user->password=Hash::make($credentials['Password']);
        $user->gender_id=$credentials['RadioBtn'];
        $user->role_id=$credentials['Role'];
        $user->modified_by=$credentials['FirstName'];
        $user->save();
        return Redirect('/Home')->with('success','Register berhasil silakan login');
    }
    public function saveFile(Request $request){
        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/storage/', $name);
                $imgData[] = $name;
            }
            $imagePath=strval('storage/'.$imgData[0]);
            return $imagePath;
        }
        return null;
    }
    public function checkUser(Request $request){
        $credentials= $request->validate([
            'email'=>['required','email:dns'],
            'password'=>['required']
        ]);
        $minutes = 10080;
        if(Auth::attempt($credentials,true)){
            $request->session()->regenerate();
            if($request['cookies']=="on"){
                Cookie::queue(Cookie::make('email', $credentials['email'], $minutes));
                Cookie::queue(Cookie::make('password', $credentials['password'], $minutes));
            }
            return redirect('/');
        }
        return back()->with('error','Email Atau Password Salah');
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('Login');
    }
    public function profile(){
        return view('pages.profile',['profile'=>User::where('id','=',auth()->user()->id)->first()]);
    }
    public function updateProfile(Request $request,$id){
        $credentials= $request->validate([
            'FirstName'=>['required','max:25','alpha'],
            'MiddelName'=>['sometimes','max:25','alpha'],
            'LastName'=>['required','max:25','alpha'],
            'Email'=>['required','email:dns'],
            'Password'=>['sometimes'],
            'Role'=>['required'],
            'RadioBtn'=>['required'],
        ]);
        $imagePath=$this->saveFile($request);
        try {
            $user= User::find($id);
            $user->first_name=$credentials['FirstName'];
            $user->middle_name=$credentials['MiddelName'];
            $user->last_name=$credentials['LastName'];
            $user->email=$credentials['Email'];
            $imagePath==null?null:$user->display_picture_link=$imagePath;
            $user->delete_flag=0;
            $credentials['Password']==null?null:$user->password=Hash::make($credentials['Password']);
            $user->gender_id=$credentials['RadioBtn'];
            $user->role_id=$credentials['Role'];
            $user->modified_by=$credentials['FirstName'];
            $user->save();
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
        return redirect('/home')->with('success','Update Profile Success');
    }
    public function maintenance(){
        return view('pages.accountMaintenance',['profils'=>User::where('id','!=',auth()->user()->id)->get()]);
    }
    public function updateRolePage($id){
        return view('pages.updateRole',['profile'=>User::where('id','=',$id)->first()]);
    }
    public function updateRole(Request $request, $id){
        $credentials= $request->validate([
            'Role'=>['sometimes'],
        ]);
        try{
            $account=User::find($id);
            $account->role_id=$credentials['Role'];
            $account->save();
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
        return redirect('/home')->with('success','Update Role Success');
    }
    public function deleteUserPage($id){
        try{
            User::where('id','=',$id)->delete();
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
        return redirect('/home')->with('success','Delete Account Success');
    }

}
