<?php
use Illuminate\Support\Facades\DB;

/**
 * check users status to see if profile complete
 * @param $user_id
 * @return mixed
 */
function checkProfileCompletion($user_id){
    $check =DB::table('users')->where('id',$user_id)->value('status');

    return $check;

}

/**
 * CHeck user's pending apps
 * @param $user_id
 * @return int
 */
function checkPendingApps($user_id){
    $check=DB::table('applications')->where([
        ['user_id','=',$user_id],

    ])->value('approved');

        return $check;
}

/**
 * Get assigned code to an application using its id
 * @param $id
 * @return mixed
 */
function getAppCode($id){
    $value=DB::table('applications')->where('id',$id)->value('code');

    return $value;
}

