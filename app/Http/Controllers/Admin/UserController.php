<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;


class UserController extends BaseController
{
    // 用户列表
    public function index(Request $request)
    {
        // return $request;
        $name = $request->input('name');
        $email = $request->input('email');
        $count = $request->input('count');
        $first = User::where('name', 'like', "%$name%");
        $last = User::where('email', 'like', "%$email%")->union($first)->paginate($count);

        return $this->response->paginator($last, new UserTransformer);

        // $users = User::when($name,function($query) use($name){
        //     $query->where('name','like',"%$name%");
        // })
        // ->when($email, function($query) use($email){
        //     $query->where('email',$email);
        // })
        // ->paginate($count);
        // return $this->response->paginator($users, new UserTransformer);
    }

    // 用户创建
    public function store(UserRequest $request)
    {   
        $password = bcrypt($request->password);
        $inputData=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
        ];
        User::create($inputData);
        return $this->response->created();
    }

    // 用户详情
    public function show(User $user)
    {

        return $this->response->item($user, new UserTransformer);
    }

    // 用户更新
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|max:16',
            'email'=>'required|email',
        ]);
        $insertData =[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),

        ];
        if(!$request->input('password')){
            unset($insertData['password']);
        }
        if($user->email==$request->input('email')){
            unset($insertData['email']);
        }

        $user->update($insertData);
        return $this->response->created();
    }

    // 用户删除
    public function destroy(User $user)
    {
        //
        $user->delete();
    }

    // 用户状态

    public function status(Request $request, User $user)
    {
        $status = $request->input('status');

        $user->update(['status' => (bool)$status]);
        return $user;
        return $this->response->noContent();
    }



     
}
