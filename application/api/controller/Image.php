<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 0:46
 */

namespace app\api\controller;


use app\model\Image as ImageModel;
class Image extends BaseController
{
    public function getAll()
    {
        $array=[];
        $limit = input('limit')?input('limit'):20;
        if(input('cat')){
            $array['cat_id'] = input('cat');
        }
        $img = new ImageModel();
       $res = $img->where($array)->paginate($limit);

        return json($res);
    }

    public function deleteById($id)
    {
       $res = ImageModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}