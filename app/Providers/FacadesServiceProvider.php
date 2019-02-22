<?php
/**
 * Created by PhpStorm.
 * User: naffan
 * Date: 2019/2/21
 * Time: 4:23 PM
 */
namespace App\Providers;

//use App\Service\ApiService;
use Illuminate\Support\ServiceProvider;

// include the class facade binded
use App\Facades\GeoIP\GeoIP;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * 在容器中注册绑定。
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('geoip', function ($app) {
            return new GeoIP($app);
        });
    }
}
