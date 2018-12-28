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
use app\common\exception\TokenException;
use think\Cookie;
use think\Exception;
use think\Request;
use think\Session;

class Token
{
    /**
     * 生成token的值
     */
    public static function generateToken(){
        //生成32为随机字符串
        $randChars = getRandChars(32);
        //获取请求时间戳
        $timestape = $_SERVER['REQUEST_TIME_FLOAT'];
        //盐
        $salt = "miaodu";
        //用三组字符串进行MD5加密产生token
        return MD5($randChars.$timestape.$salt);
    }

    /**
     * 获取token变量的值
     * @param $key
     * @return mixed
     * @throws ServiceException
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header('X-Token');
        if(!$token){
            throw new TokenException(['msg'=>'Token不存在']);
        }
        $result = Session::get($token);
        if($result){
            if (!is_array($result)){
                $result = json_decode($result,true);
            }
            if (array_key_exists($key,$result)){
                return $result[$key];
            }
            else{
                throw new ServiceException(['msg'=>'尝试获取的Token变量并不存在']);
            }
        }else{
           throw new TokenException();
        }
    }

    /**
     * 清理session
     * @return bool
     */
    public static function cutSession(){
        $token = Request::instance()->header('X-Token');
        if($token){
            $session = Session::get($token);
            if($session){
                Session::delete($token);
            }
        }
        return true;
    }
}