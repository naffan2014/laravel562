<?php
/**
 * Created by PhpStorm.
 * User: naffan
 * Date: 2018/8/18
 * Time: 上午12:21
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Facades\GeoIP\Facade\GeoIP;
use Illuminate\Support\Facades\Redis;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 *
 */
class UserController extends Controller
{

    function index(){
        Log::debug('An informational message.');
        echo 'done';
//        Cache::put('key1','val1',10);
//
//         $value =  Cache::get('key1');
//         var_dump($value);
    }

    /**
     * 函数的作用
     *
     * @param  int $id
     * @return object
     */

    public function showProfile(int $id): object
    {
        $user = Redis::get('user:profile');
        return $user;
    }

    /**
     *
     * @return mixed
     * User: 张一帆
     */
    public function fakeInsert()
    {
        $res = Redis::pipeline(function ($pipe) {
            for ($i = 0; $i < 100; $i++) {
                $pipe->setex("key:$i", $i, 10);
            }
        });
    }



    public function testFacade(){
        $res = GeoIP::getCountry('75.101.195.215');
        var_dump($res);
    }
}