<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 0:06
 */

namespace app\common\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已经过期或无效';
    public  $errorCode = 50008;

}