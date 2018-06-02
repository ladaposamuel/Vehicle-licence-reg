<?php

namespace App\Http\Controllers\Mang;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mang');
    }


    public function spool(Request $request)
    {
        $data = [];
        $param = $request->input('option');

//if parameter is asking for total registrants lets give it
        if ($param == 'tot_regs') {
            $data['title'] = "Registrants";
            $data['results'] = DB::table('users')->get();
            return view('mang/reports/users_list')->withData($data);
        } elseif ($param == 'tot_op_apps') {
            $data['title'] = "open applications";
            $data['results'] = DB::table('applications')->where('approved', '0')->get();
            return view('mang/reports/list')->withData($data);
        } elseif ($param == 'tot_appr_apps') {
            $data['title'] = "Approved Applications";

            $data['results'] = DB::table('applications')->where('approved', '1')->get();
            return view('mang/reports/list')->withData($data);
        } elseif ($param == 'tot_dappr_apps') {
            $data['title'] = "rejected applications";

            $data['results'] = DB::table('applications')->where('approved', '2')->get();
            return view('mang/reports/list')->withData($data);
        } elseif ($param == 'all_apps') {
            $data['title'] = "All Applications";

            $data['results'] = DB::table('applications')->get();
            return view('mang/reports/list')->withData($data);
        }


    }


    public function view($id)
    {
        //verify id
        $verifyId = DB::table('applications')->where('id', $id)->count();
        if ($verifyId > 0) {
            $data = [];
            $data['id']=$id;
            $data['results'] = DB::table('applications')->where('id', $id)->get();
            $data['status_logs']=DB::table('app_status')->where('app_id', $id)->get();
            return view('mang/reports/view_app')->withData($data);
        } else {
            abort('404');
        }
    }


    public function update(Request $request){
        //verify id
        $id= $request->input('app_id');
        $status= $request->input('status');
        $comments= $request->input('comments');
        $verifyId = DB::table('applications')->where('id', $id)->count();
        if ($verifyId > 0) {
            //update applications table
           $update = DB::table('applications')->where('id',$id)->update([
               'approved' => $status,
           ]);
           //update status table
            DB::table('app_status')->insert([
                'app_id' =>  $id,
                'status' => $status,
                'comment' => $comments,
                'mang_type' => 'reviewer',
            ]);

            return redirect()->back();
        } else {
            abort('404');
        }
    }
}
