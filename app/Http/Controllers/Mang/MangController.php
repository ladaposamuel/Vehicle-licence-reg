<?php

namespace App\Http\Controllers\Mang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mang');
    }


    public function index()
    {
        $data = [];
        //dashboard stats
        //++ total registered users
        $data['tot_regs'] = DB::table('users')->count();
        //++ total open apps
        $data['tot_op_apps'] = DB::table('applications')->where('approved', '0')->count();
        //++ total approved apps
        $data['tot_appr_apps'] = DB::table('applications')->where('approved', '1')->count();
        //++ total disapproved apps
        $data['tot_dappr_apps'] = DB::table('applications')->where('approved', '2')->count();

        //processors
        $data['aw_appr']=DB::table('applications')->where('approved','3')->get();
        return view('mang.dashboard')->withData($data);
    }
}
