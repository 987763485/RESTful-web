<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/21
 * Time: 21:01
 */

namespace app\api\controller;


use app\common\exception\RequestException;
use app\model\ProductCat as ProductCatMolde;

class ProductCat extends BaseController
{
    public function getAll()
    {
//        $res = ProductCatMolde::getAll();
//        if($res->isEmpty()){
//            throw new RequestException();
//        }else{
//            return success($res);
//        }
        $cat = new ProductCatMolde();
        $res = $cat->select();
        return success($res);

    }

    public function post()
    {
        $data=[
            'parent_id'=>input('post.parent_id'),
            'name'=>input('post.name'),
            'weight'=>input('post.weight')
        ];

        $category = new ProductCatMolde();
        $res = $category->save($data);
        if($res){
            return success($category);
        }else{
            return faild($res);
        }
    }

    public function updateById($id)
    {
        $data=[
            'parent_id'=>input('put.parent_id'),
            'name'=>input('put.name'),
            'weight'=>input('put.weight')
        ];
        $res = ProductCatMolde::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

    public function deleteById($id)
    {
        $res = ProductCatMolde::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }


}