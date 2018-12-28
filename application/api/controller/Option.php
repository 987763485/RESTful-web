<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 16:22
 */

namespace app\api\controller;


use app\common\exception\RequestException;
use app\model\Option as OptionModel;
use think\Request;

class Option extends BaseController
{
    public function getAll(){
       $options = OptionModel::getAll();
       if($options->isEmpty()){
           throw new RequestException();
       }else{
           return success($options);
       }
    }
    public function getOne($name){
        $option = OptionModel::getOne($name);
        if(!$option){
            return faild($option);
        }
        return success($option);
    }

    public function updateOption($name){
        $option = new OptionModel();
        $data = OptionModel::getOne($name);
        $values = json_encode(input('post.values/a'));
        if($data['Id']){
           $res = $option::update(['option_values'=>$values],['Id'=>$data['Id']]);
            if($res){
                return success($res);
            }else{
                return faild($res);
            }
        }else{
            $res = $option->save(['option_name'=>$name,'option_values'=>$values]);
            if($res){
                return success($res);
            }else{
                return faild($res);
            }
        }

    }
}