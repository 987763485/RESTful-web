<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/11/23
 * Time: 14:10
 */

namespace app\common\model;


use think\Model;
use think\Request;
use traits\model\SoftDelete;

class BaseModel extends Model
{
    //开启软删除
    use SoftDelete;

    protected $hidden=['delete_time'];
    protected $field = true;

    /**
     * 获取所有数据
     * @return BaseModel[]|false
     * @throws \think\exception\DbException
     */
    public static function getAll(){
        $result = self::all();
        return $result;
    }

    /**
     * 根据ID获取一条数据
     * @param $id
     * @return BaseModel
     * @throws \think\exception\DbException
     */
    public static function getOne($id){
        $result = self::get($id);
        return $result;
    }

    /**
     * 新增数据
     * @param $data
     * @return false|int
     */
    public  function post($data){
        $result = $this->allowField(true)->save($data);
        return $result;
    }

    /**
     * 跟新数据
     * @param $id
     * @param $data
     * @return BaseModel
     */
    public static function updateById($id,$data){
        $result = self::update($data,['Id'=>$id]);
        return $result;
    }

    /**
     * 删除数据
     * @param $id
     * @return int
     */
    public static function deleteById($id){
        $result = self::destroy($id);
        return $result;
    }

    protected function prefixImgUrl($value){
       return Request::instance()->domain()."/public/uploads".$value;
//        return "../public/uploads".$value;
    }

}