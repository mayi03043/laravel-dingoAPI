<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

$api = app('Dingo\Api\Routing\Router');

// 版本组
$api->version('v1', function ($api) {

    // 前缀组
    $api->group(['prefix' => 'auth'], function ($api) {

        // 注册
        $api->post('register',[RegisterController::class,'store'])->name('auth.store');

        // 登入
        $api->post('login',[LoginController::class,'login'])->name('auth.login');

        
        // 需要登入验证
        // 数组提取
        $param=[
            // 中间件
            'middleware'=>[
                'jwt.auth',  // 登入验证  //tymon/jwt-auth
                'api.throttle',  // 访问截流
                'bindings',  // 模型注入绑定
                'serializer:array'  // 减少transformer包裹层 //dingo-serializer-switch
            ],
            
            'limit' => 30,  // 次数
            'expires' => 1  // 时间
        ];
        $api->group( $param, function ($api) {
            // 我的
            $api->post('me',[LoginController::class,'me'])->name('auth.me');
            // 注销
            $api->post('logout',[LoginController::class,'logout'])->name('auth.logout');
            // 刷新token
            $api->post('refresh',[LoginController::class,'refresh'])->name('auth.refresh');

        });
        
    });

});