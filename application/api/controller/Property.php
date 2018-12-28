<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 0:22
 */

namespace app\api\controller;


use app\common\exception\RequestException;
use app\model\Property as PropertyModel;
class Property extends BaseController
{
    public function getAll()
    {
        $res = PropertyModel::getAll();
//        if($res->isEmpty()){
//            throw new RequestException();
//        }else{
//            return success($res);
//        }
        return success($res);
    }

    public function post()
    {
        $data = [
            'name'=>input('post.name'),
            'values'=>json_encode(input('post.values/a'))
        ];
        $property = new PropertyModel();
        $res = $property->save($data);
        if($res){
            return success($property);
        }else{
            return faild($res);
        }
    }

    public function updateById($id)
    {
        $data = [
            'name'=>input('post.name'),
            'values'=>json_encode(input('post.values/a'))
        ];
        if(input('put.Id')){
            throw new BaseException();
        }
        $res = PropertyModel::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

    public function deleteById($id)
    {
       $res = PropertyModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}