<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2019/1/6
 * Time: 17:34
 */

use app\web\service\ApiService as ApiService;


function get_nav_bar(){
    return ApiService::get_nav_bar();
}

function get_product_cate(){
    return ApiService::get_product_cate();
}
//根据父类Id取得所有子类的Id，返回一个数组
function get_cate_array($res,$id){
    return ApiService::get_cate_array($res,$id);
}

function get_banner(){
    return ApiService::get_banner();
}

function get_option($key){
    return ApiService::get_option($key);
}

function get_link(){
    return ApiService::get_link();
}

function get_product_hot($number){
    return ApiService::get_product_hot($number);
}

function get_product_refer($number){
    return ApiService::get_product_refer($number);
}

function get_news($number){
    return ApiService::get_news($number);
}

function get_page_nav_list($nav){
    return ApiService::get_page_nav_list($nav);
}


function get_prev_product($id){
    return ApiService::get_prev_product($id);
}
function get_next_product($id){
    return ApiService::get_next_product($id);
}

function get_related_product($cid){
    return ApiService::get_related_product($cid);
}