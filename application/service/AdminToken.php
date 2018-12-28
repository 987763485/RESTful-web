<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/19
 * Time: 21:27
 */

namespace app\service;


use app\common\exception\ServiceException;
use think\Session;

class AdminToken extends Token
{
    public function getToken($data){
        $key = self::generateToken();
        $value = $data;
        $result = Session::set($key,$value);
        if($result){
            throw new ServiceException([
                'msg' => 'session写入异常',
                'errorCode' => 50005
            ]);
        }
        $cookie = ["token"=>$key,"username"=>$data['name']];
        return $cookie;
    }

}