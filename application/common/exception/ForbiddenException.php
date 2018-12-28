<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 15:00
 */

namespace app\common\exception;




class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '用户权限不足，禁止访问';
    public  $errorCode = 10001;

}