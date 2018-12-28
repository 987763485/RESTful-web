<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2018/12/22
 * Time: 15:40
 */

namespace app\service;


class Roles
{
    public static function roles($scope){
        switch ($scope){
            case $scope>=64:
                return ['super','admin'];
                break;
            case $scope>=32:
                return ['admin'];
                break;
            case $scope>=16:
                return ['member'];
                break;
            default:
                return ['user'];
        }
    }

}