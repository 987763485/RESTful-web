<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/11/23
 * Time: 14:10
 */

namespace app\model;


class Products extends BaseModel
{
    protected $hidden = ['create_time','update_time','delete_time'];
    public function cat(){
        return $this->belongsTo('ProductCat','cat_id','Id');
    }

    public static function getProductList(){
        return self::with('cat')->select();
    }

}