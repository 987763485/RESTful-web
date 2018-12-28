<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/19
 * Time: 20:02
 */

namespace app\model;


class Option extends BaseModel
{
    protected $createTime = false;

    public static function getOne($name){
        $res = self::get(['option_name'=>$name]);
        return $res;
    }
}