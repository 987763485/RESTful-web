<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/11/23
 * Time: 22:24
 */

namespace app\common\exception;


class AdminException extends BaseException
{
    public $code = 404;
    public $msg = "用户名或密码错误";
    public $errorCode = 10001;
}