<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/21
 * Time: 20:39
 */

namespace app\api\controller;


use app\common\exception\RequestException;
use app\model\Nav as NavModel;

class Nav extends BaseController
{
    public function getAll(){
        $res = NavModel::getAll();
        return success($res);
    }

    public function post(){
        $data = input('post.');
        $nav = new NavModel();
        $res = $nav->save($data);
        if ($res){
            return success($nav);
        }else{
            faild($res);
        }
    }

    public function updateById($id)
    {
        $data = input('put.');
        if(input('put.Id')){
            throw new BaseException();
        }
         $res = NavModel::updateById($id,$data);
         if($res){
             return success($res);
         }else{
             return faild($res);
         }
    }

    public function deleteById($id)
    {
      $res = NavModel::deleteById($id);
      if ($res){
          return success($res);
      }else{
          return faild($res);
      }
    }

}