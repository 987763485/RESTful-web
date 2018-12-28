<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/11/23
 * Time: 19:49
 */

namespace app\api\controller;


use app\common\exception\ForbiddenException;
use app\service\Token;
use think\Controller;

class BaseController extends Controller
{
    protected $beforeActionList = [
        'checkPrimaryScope'=>['except'=>'Login']
    ];

    /**
     * 管理员接口权限
     * @return bool
     * @throws \app\common\exception\TokenException
     */
    public function checkPrimaryScope(){
        $scope = Token::getCurrentTokenVar('scope');

        if($scope){
            if ($scope >= 32){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }

    }

    /**
     * 获取模型所有数据
     * @return \think\response\Json
     */
    public function getAll(){
        return json(['msg'=>'接口未开发'],'200');
    }

    /**
     * 根据ID获取模型的一条数据
     * @param $id
     * @return \think\response\Json
     */
    public function getOne($id){
        return json(['msg'=>'接口未开发'],'200');
    }

    /**
     * 提交一条数据
     * @return \think\response\Json
     */
    public function post(){
        return json(['msg'=>'接口未开发'],'200');
    }

    /**
     * 根据ID跟新模型的数据
     * @param $id
     * @return \think\response\Json
     */
    public function updateById($id){
        return json(['msg'=>'接口未开发'],'200');
    }

    /**
     * 根据ID删除模型的数据
     * @param $id
     * @return \think\response\Json
     */
    public function deleteById($id){
        return json(['msg'=>'接口未开发'],'200');
    }

}