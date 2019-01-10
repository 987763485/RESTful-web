<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/19
 * Time: 20:03
 */

namespace app\common\model;


class Page extends BaseModel
{
    protected $hidden = ['create_time','update_time','delete_time'];

    public function Nav(){
        return $this->belongsTo("Nav",'nav_id','Id');
    }

    public static function getAll(){
        $result = self::with('Nav')->select();
        return $result;
    }

}