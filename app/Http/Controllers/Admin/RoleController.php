<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Transformers\RoleTransformer;


class RoleController extends BaseController
{
    /**
     *   角色列表
     */
    public function index()
    {   
        
        $role = Role::all();
        return $this->response->collection($role, new RoleTransformer);
    }

    /**
     *    创建角色
     */
    public function store(Request $request, Role $role)
    {
        //
        $arr=$request->input();

        //创建角色



        // 获取权限集合
        $inper = Permission::whereIn('name', $arr)->get();
        // 为角色重新添加权限
        $role->syncPermissions($inper);

    }

    /**
     *    角色详情
     */
    public function show($id)
    {
        //
    }

    /**
     *  编辑角色
     */
    public function update(Request $request, Role $role)
    {
        
    
        $arr=$request->input();

        // 获取权限集合
        $inper = Permission::whereIn('name', $arr)->get();
      
        // 为角色清空权限
        $role->revokePermissionTo(Permission::all());

        // 为角色重新添加权限
        $role->syncPermissions($inper);
        
    }

    /**
     *    删除角色
     */
    public function destroy(Role $role)
    {
        // 清空所有权限
        $role->revokePermissionTo(Permission::all());
        // 删除角色
        $role->delete();
        return $this->response->noContent();
    }
}
