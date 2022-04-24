<?php

use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

$api = app('Dingo\Api\Routing\Router');

// 版本组
$api->version('v1', function ($api) {

    //前缀组
    $api->group(['prefix' => 'admin'], function ($api) {
        

        // 需要登入验证
        // 数组提取
        $param=[
            // 中间件
            'middleware'=>[
                
                'jwt.auth',  // 登入验证  //tymon/jwt-auth
                'api.throttle',  // 访问截流
                'bindings',  // 模型注入绑定
                'serializer:array',  // 减少transformer包裹层 //dingo-serializer-switch
                'check.permission',  //权限验证  //spatie/laravel-permission
            ],
            
            'limit' => 30,  // 次数
            'expires' => 1  // 时间

        ];
        $api->group($param, function($api){

            // 用户     ['except' => ['destroy']
            $api->patch('users/{user}/status', [UserController::class,'status'])->name('user.status');
            $api->resource('users',UserController::class);
            // 菜单
            $api->resource('menus',AdminMenuController::class,[
                'only'=> ['index']
            ]);

            // 角色
             $api->resource('role',RoleController::class);
        });
        
        
    });

});