<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/21
 * Time: 2:02
 */

namespace app\api\controller;


use app\common\exception\BaseException;
use app\common\exception\RequestException;
use app\model\Banner as BannerModel;
use app\model\BaseModel;

class Banner extends BaseController
{
    public function getAll(){
        $banners = BannerModel::getAll();
        return success($banners);
    }

    public function post(){
        $data = input('post.');
        $banner = new BannerModel();
        $res = $banner->post($data);
        if($res){
            return success($banner);
        }else{
            return faild($res);
        }

    }

    public function updateById($id){
        $data = input('put.');
        if(input('put.Id')){
            throw new BaseException();
        }
        $res = BannerModel::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }
    public function deleteById($id){
        $res = BannerModel::destroy($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }
}