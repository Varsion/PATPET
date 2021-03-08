<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $loginRequest)
    {
        try {
            $credentials = self::credentials($loginRequest);

            if (!$token = auth('user')->attempt($credentials)) {
                return json_fail('Email or Password error!', null, 100);
            }

            return self::respondWithToken($token, 'Login Success!');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return json_fail('Login Failed!', null, 500);
        }
    }

    public function logout()
    {
        try {
            auth()->logout();
        } catch (\Exception $e) {
        }
        return auth()->check() ?
            json_success('Logout Success!', null, 200) :
            json_fail('Logout Faild', null, 100);
    }

    public function refresh()
    {
        try {
            $newToken = auth()->refresh();
        } catch (\Exception $e) {
        }
        return $newToken != null ?
            self::respondWithToken($newToken, 'Refresh Success!') :
            json_fail('Refresh Failed!', null, 100);
    }

    protected function credentials($request)
    {
        return ['email' => $request['email'], 'password' => $request['password']];
    }



    protected function respondWithToken($token, $msg)
    {
        return json_success($msg, array(
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("user")->factory()->getTTL() * 60
        ), 200);
    }

    /**
     * 注册用户
     *
     */
    public function registered(Request $registeredRequest)
    {
        return User::createUser(self::userHandle($registeredRequest)) ?
            json_success('Register Success!', null, 200) :
            json_fail('Register Failed!', null, 100);
    }

    /**
     * User Request
     */
    protected function userHandle($request)
    {
        $registeredInfo['password'] = bcrypt($request['password']);
        $registeredInfo['email'] = $request['email'];
        $registeredInfo['name'] = $request['name'];
        return $registeredInfo;
    }

    /**
     * Get User Info
     */
    public function info()
    {
        $UserInfo = User::getUserInfo(auth()->id(), array('id', 'name'));
        return $UserInfo != null ?
            json_success('Get Success!', $UserInfo, 200) :
            json_fail('Get Failed!', null, 100);
    }
}

