<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/20
 * Time: 16:08
 */

namespace app\api\controller;


use app\model\Articles as ArticlesModel;

class Article extends BaseController
{
    public function getAll($limit=10,$where=array())
    {
        $where = array_merge($where);
        $articles = new ArticlesModel();
        $res = $articles->where($where)->order('create_time','desc')->paginate($limit);
        return success($res);
    }

    public function getOne($id)
    {
        $res = ArticlesModel::getOne($id);
       if($res){
           return success($res);
       }else{
           return faild($res);
       }
    }

    public function post()
    {
        $data = input('post.');
        $article = new ArticlesModel();
        $res = $article->save($data);
        if($res){
            return success($article);
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
        $res = ArticlesModel::updateById($id,$data);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

    public function deleteById($id)
    {
        $res = ArticlesModel::deleteById($id);
        if($res){
            return success($res);
        }else{
            return faild($res);
        }
    }

}