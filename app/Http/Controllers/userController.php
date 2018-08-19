<?php
/**
 * Created by PhpStorm.
 * User: naffan
 * Date: 2018/8/18
 * Time: 上午12:21
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;


class UserController extends Controller{

    /**
     * @param $id
     * @return mixed
     * User: 张一帆
     */
    public function showProfile($id){
        $user = Redis::get('user:profile');
        return $user;
    }

    public function fakeInsert(){
        $res = Redis::pipeline(function($pipe){
            for($i = 0; $i < 1000; $i++){
                $pipe->set("key:$i",$i);
            }
        });
        return $res;
    }}