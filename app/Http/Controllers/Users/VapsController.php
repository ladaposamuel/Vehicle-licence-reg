<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VapsController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function save(Request $request)
    {

//        dd($request->all());
        $user = Auth::id();

        $this->validate($request, array(
            'type' => 'required',
            'dts' => 'required',
            'state' => 'required',
            'status' => 'required',
            'address' => 'required',

        ));
//check if user has an existing pending application
        $check = DB::table('applications')->where([
            ['user_id', '=', $user],
            ['approved', '=', 0],
        ])->count();

        if ($check  == 1) {
            Session::flash('error', "sorry you still have a pending application");
        } else {
            Session::flash('success', "Your application has been submitted successfully an awaiting approval");
        $save = DB::table('applications')->insert([
            'type' => $request->input('type'),
            'user_id' => $user,
            'dts' => $request->input('dts'),
            'state' => $request->input('state'),
            'status' => $request->input('status'),
            'code' => rand(00000,99999),
            'address' => $request->input('address'),
        ]);

        }
        return redirect()->route('home');
    }

}
