<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 1:02
 */

namespace app\api\controller;

use app\common\exception\RequestException;
use  app\model\System as SystemModel;
class System extends BaseController
{
     public function get()
     {
         $res = SystemModel::getOne(1);
         if($res){
             return success($res);
         }else{
             throw new RequestException();
         }
     }

     public function post()
     {
         $data = input('post.');
         $system = new SystemModel();
         $exit = $system->where('id',1)->find();
         if($exit){
             $res = $system::updateById(1,$data);
         }else{
             $res = $system->post($data);
         }
     }

}