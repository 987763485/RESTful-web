<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 0:28
 */

namespace app\api\controller;

use app\common\exception\RequestException;
use app\model\Page as PageModel;
class Page extends BaseController
{
    public function getAll()
    {
        $res = PageModel::getAll();
        return success($res);
    }

    public function getOne($id)
    {
        $res = PageModel::getOne($id);
        if($res){
            return success($res);
        }else{
            throw new RequestException();
        }
    }

    public function post()
    {
        $data = input('post.');
        $page = new PageModel();
        $res = $page->save($data);
        if($res){
            return success($page);
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
        $res = PageModel::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

    public function deleteById($id)
    {
        $res = PageModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}