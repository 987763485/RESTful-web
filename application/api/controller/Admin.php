<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/11/23
 * Time: 19:50
 */

namespace app\api\controller;


use app\common\exception\AdminException;
use app\common\exception\TokenException;
use app\model\Admin as AdminModel;
use app\service\AdminToken;
use app\service\Roles;
use app\service\Token;
use think\Session;

class Admin extends BaseController
{
    public function Login(){
        $username = input('post.username');
        $password = md5(input("post.password"));
        $user = new AdminModel();
        $res = $user->where('username',$username)->find();
        if ($res && $password === $res->password){
            $roles = Roles::roles($res->scope);
            $admin = new  AdminToken();
            $data = ['name'=>$res->username,'roles'=>$roles,'nickname'=>$res->nickname,'uid'=>$res->Id,'scope'=>$res->scope,'avatar'=>$res->avatar];
            $result= $admin->getToken($data);
            return json(['code'=>10000,'msg'=>'success','data'=>$result]);
        }else{
            Token::cutSession();
            throw new AdminException();
        }
    }

    public function Logout(){
        Token::cutSession();
        $data = '';
        return success($data);
    }

    public function Modify(){
        $newPassword = md5(input('newpassword'));
        $uid = Token::getCurrentTokenVar('uid');
        $admin = AdminModel::get($uid);
        $admin->password = $newPassword;
        $res = $admin->save();
        if($res){
            return json(['code'=>10001,'msg'=>'修改密码成功','data'=>''],201);
        }
        else{
            return json(['code'=>10002,'msg'=>'修改密码失败','data'=>''],422);
        }
    }

    public function Info($token){
        $res = Session::get($token);
        if($res){
            return success($res);
        }else{
           throw new TokenException();
        }

    }
}