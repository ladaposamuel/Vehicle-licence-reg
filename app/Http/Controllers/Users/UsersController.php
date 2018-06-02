<?php

namespace App\Http\Controllers\Users;

use App\User;
use Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        $data=[];
        $user=Auth::id();
        $data['profile_data']=DB::table('users')->where('id',$user)->get();

        return view('users/profile')->withData($data);

    }

    public function update(Request $request){
//        dd($request->all());
        $user=Auth::id();

        $this->validate($request, array(
            'firstname' => 'required',
            'lastname'  => 'required',
            'dob' => 'required',
            'sex'  => 'required',
            'occupation'  => 'required',
            'address'  => 'required',
        ));



        $user = User::find($user);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->dob = $request->input('dob');
        $user->sex = $request->input('sex');
        $user->occupation = $request->input('occupation');
        $user->status = '1';

//        if ($request->hasFile('profile_pic')) {
//            $image = $request->file('profile_pic');
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $location = public_path('images/' . $filename);
//            Image::make($image)->resize(150, 150)->save($location);
//            $user->profile_pic = $filename;
//        }


        $user->address = Purifier::clean($request->input('address'));
        $user->save();

        Session::flash('success','Profile updated successfully');

        return redirect()->route('home');

    }
}
