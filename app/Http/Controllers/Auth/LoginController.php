<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Transformers\UserTransformer;

class LoginController extends BaseController
{
    // 登入
    public function login()
    {
        
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            
            return $this->response->errorUnauthorized('登入失败');
            
        }

        if(!auth('api')->user()->status){
            return $this->response->errorForbidden('用户已停用，请联系管理员');
        }
        

        // 最后登入时间
        $user = User::find(auth('api')->user()->id);
        $user ->logintime = now();
        $user->timestamps = false;
        $user->save();
        
        return $this->respondWithToken($token);
        
    }

    // 登入用户
    public function me()
    {
        
        return $this->response->item(auth('api')->user(), new UserTransformer);
    }

    // 注销
    public function logout()
    {
        auth('api')->logout();

        
        return $this->response->noContent('注销成功');
    }

    /**
     * Refresh a token.
     * 刷新token，如果开启黑名单，以前的token便会失效。
     * 值得注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
        
    }

    // 分配JWT
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
