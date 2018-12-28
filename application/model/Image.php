<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/19
 * Time: 19:59
 */

namespace app\model;


class Image extends BaseModel
{
    protected $hidden=['create_time','update_time','delete_time'];

    public function getUrlAttr($value){
        return $this->prefixImgUrl($value);
    }

}