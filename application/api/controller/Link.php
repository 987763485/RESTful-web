<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 0:37
 */

namespace app\api\controller;

use app\common\exception\RequestException;
use app\model\Link as LinkModel;
class Link extends BaseController
{
    public function getAll()
    {
        $res = LinkModel::getAll();
        if($res->isEmpty()){
            return faild($res);
        }else{
            return success($res);
        }
    }

    public function post()
    {
        $data = input('post.');
        $link = new LinkModel();
        $res = $link->save($data);
        if($res){
            return success($link);
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
       $res = LinkModel::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

    public function deleteById($id)
    {
        $res = LinkModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}