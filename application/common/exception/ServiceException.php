<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 14:50
 */

namespace app\common\exception;


class ServiceException extends BaseException
{
    public $code = 500;
    public $msg = '服务器内部错误！';
    public $errorCode = 50001;

}