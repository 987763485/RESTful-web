<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 0:46
 */

namespace app\api\controller;

use app\model\ImageCat as ImageCatModel;
class ImageCat extends BaseController
{
    public function getAll()
    {
        $res = ImageCatModel::getAll();
        if($res->isEmpty()){
            throw new RequestException();
        }else{
            return success($res);
        }
    }

    public function post()
    {
        $data = input('post.');
        $cat = new ImageCatModel();
        $res = $cat->save($data);
        if($res){
            return success($cat);
        }else{
            return faild($res);
        }
    }

    public function updateById($id)
    {
        $data = input('put.');
        if(input('put.Id')){
            throw new BaseException();
        }
        $res = ImageCatModel::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

    public function deleteById($id)
    {
        $res = ImageCatModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}