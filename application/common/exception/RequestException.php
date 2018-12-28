<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 16:58
 */

namespace app\common\exception;


class RequestException extends BaseException
{
    public $code = 404;
    public $msg = '请求的资源不存在';
    public $errorCode = 10000;
}