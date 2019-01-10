<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/21
 * Time: 21:27
 */

namespace app\api\controller;


use app\common\exception\RequestException;
use app\model\Products as ProductsModel;

class Product extends BaseController
{
    public function getAll($limit=10,$where=array())
    {
        $product = new ProductsModel();
        $res = $product::with('cat')->where($where)->order('create_time','desc')->paginate($limit);
        return success($res);
    }

    public function getOne($id)
    {
        $res = ProductsModel::getOne($id);
        if($res){
            return success($res);
        }else{
            throw new RequestException();
        }
    }

    public function post()
    {
        $data = input('post.');
        $data['album'] = json_encode(input('post.album/a'));
        $data['property'] = json_encode(input('post.property/a'));
        $product = new ProductsModel();
        $res = $product->save($data);
        if($res){
            return success($product);
        }else{
            return faild($res);
        }
    }

    public function updateById($id)
    {
        $data = input('put.');
        $data['album'] = json_encode(input('post.album/a'));
        $data['property'] = json_encode(input('post.property/a'));
        if(input('put.Id')){
            throw new BaseException();
        }
       $res = ProductsModel::updateById($id,$data);
       if($res){
           return success($res);
       }else{
           return faild($res);
       }
    }

    public function deleteById($id)
    {
        $res = ProductsModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}