<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\AdminMenu;
use App\Transformers\AdminMenuTransformer;
use Illuminate\Http\Request;

class AdminMenuController extends BaseController
{
    // 菜单列表
    public function index()
    {
        // 查询当前用户权限
        $user = auth('api')->user()->getPermissionsViaRoles();
       
        
        // 遍历权限列表
        $arr = [];
        foreach($user as $item){
            $arr[] = $item['name'];
        }
        
        // 筛选权限内的菜单
        $menus = AdminMenu::whereIn('route',$arr)
        ->where('pid',0)
        ->where('hidden',0)
        ->where('status',0)
        ->get();
        // return $menus;
        return $this->response->collection($menus, new AdminMenuTransformer);
        
       
    }

    // 菜单创建
    // ['mid'=>'4','pid'=>'1','title'=>'欢迎页面','route'=>'home.index','hidden'=>'0','url'=>'/home'],
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
