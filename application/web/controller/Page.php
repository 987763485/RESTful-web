<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2019/1/9
 * Time: 18:08
 */

namespace app\web\controller;


use app\common\model\Nav;
use app\common\model\Page as PageModel;
use think\Controller;

class Page extends Controller
{
    public function Index(){
        $nav_id = input('nav');
        $id = input('id');
        $pages = new PageModel();
        if($id){
            $page = $pages->where(['Id'=>$id,'status'=>1])->find()->toArray();
        }else{
            $page = $pages->where(['nav_id'=>$nav_id,'status'=>1])->order('weight','desc')->find()->toArray();
        }
        $nav = new Nav();
        $res = $nav->find(['Id'=>$nav_id])->toArray();
        $this->assign('page',$page);
        $this->assign('nav',$res);
        return $this->fetch();
    }
}