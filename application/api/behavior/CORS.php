<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 18:49
 */

namespace app\api\behavior;


class CORS
{
    public function appInit(&$params){
        header("Access-Control-Allow-Origin:http://localhost:9528");
        header("Access-Control-Allow-Credentials:true");
        header("Access-Control-Allow-Headers:X-Token,Origin,X-Requested-width,Content-Type,Accept");
        header("Access-Control-Allow-Methods:POST,GET,DELETE,PUT");
        if(request()->isOptions()){
            exit();
        }
    }

}