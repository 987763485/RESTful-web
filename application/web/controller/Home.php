<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/11/23
 * Time: 20:07
 */

namespace app\web\controller;


use think\Controller;

class Home extends Controller
{
    public function index(){
    return $this->fetch();
}

}