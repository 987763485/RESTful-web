<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/25
 * Time: 15:25
 */

namespace app\api\controller;


use think\Controller;
use app\model\Image as ImageModel;

class Upload extends Controller
{
    public function Image(){
       $file = request()->file('file');
       $floder = input('floder');
       $image = new ImageModel();
       if($file){
           $info = $file->validate(['ext'=>'jpg,png,gif'])->rule('uniqid')->move(ROOT_PATH . 'public' . DS . 'uploads'. DS .$floder);
           if($info){
               $data =[
                   'url'=>$floder."/".$info->getFilename()
               ];
               $res = $image->post($data);
               if($res == 1){
                   return success($image);
               }else{
                   return faild('err');
               }

           }else {
               return $info->getError();
           }
       }else{
           return faild('文件不能为空');
       }
    }
}