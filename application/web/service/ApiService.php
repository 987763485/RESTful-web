<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2019/1/8
 * Time: 21:28
 */

namespace app\web\service;



class ApiService
{
    public static function get_nav_bar(){
        $nav = model('Nav');
        return $nav->where(['is_show'=>1])->order('weight','desc')->select();
    }

    public static function get_product_cate(){
        $cate = model('ProductCat');
        $data = $cate->order('weight','desc')->select()->toArray();
        $tree = self::get_cate_tree($data,0);
        $html = self::get_cate_tree_html($tree);
        return $html;
    }
    public static function get_cate_tree($data, $pid=0)
    {
        $tree = '';
        foreach($data as $k => $v)
        {
            if($v['parent_id'] == $pid)
            {
                $v['child'] = self::get_cate_tree($data, $v['Id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }

    public static function get_cate_tree_html($tree){
        $html = '';
        foreach($tree as $t)
        {
            if($t['child'] == '')
            {
                $html .= "<li><a href=".url('web/product/index',['cate'=>$t['Id']]).">{$t['name']}</a></li>";
            }
            else
            {
//                需要打开后代链接的
                $html .= "<li><a href=".url('web/product/index',['cate'=>$t['Id']]).">".$t['name']."</a>";
//                只打开最后一级分类的
//                $html .= "<li><a>".$t['name']."</a>";
                $html .= self::get_cate_tree_html($t['child']);
                $html = $html."</li>";
            }
        }
        return $html ? '<ol>'.$html.'</ol>' : $html ;
    }

    public static function get_cate_array($data,$pid,$cateArr=''){
       global $cateArr;
        $cateArr[] = $pid;
        foreach ($data as $v) {
            if($v['parent_id'] == $pid){
                self::get_cate_array($data,$v['Id'],$cateArr);
            }
        }
        return $cateArr;
    }
    public static function get_banner(){
        $banner = model('Banner');
        return $banner->select();
    }

    public static function get_option($key){
        $option = model('Option');
        $value = $option->get(['option_name'=>$key]);
        $json = json_decode($value['option_values'],true);
        return $json;
    }

    public static function get_link(){
        $link = model('Link');
        return $link->select();
    }

    public static function get_product_hot($number = 4){
        $products = model('Products');
        return $products->where(['status'=>1])->limit($number)->order('hot','desc')->select();
    }

    public static function get_product_refer($number){
        $products = model('Products');
        return $products->where(['status'=>1])->limit($number)->order('is_refer','desc')->select();
    }

    public static function get_article($number = 4){
        $articles = model('Articles');
        return $articles->where(['status'=>1])->limit($number)->order('create_time','desc')->select();
    }

    public static function get_page_nav_list($nav){
        $page = model('Page');
        return $page->where(['nav_id'=>$nav,'status'=>1])->order('weight','desc')->select();
    }

    public static function get_prev_product($id){
        $product = model('Products');
        $map['Id'] = array('gt',$id);
        $map['status'] = array('eq',1);
        return $product->field('Id,name')->where($map)->find();
    }

    public static function get_next_product($id){
        $product = model('Products');
        $map['Id'] = array('lt',$id);
        $map['status'] = array('eq',1);
        return $product->field('Id,name')->where($map)->find();
    }

    /**
     * @param $cid
     * @return mixed
     */
    public static function get_related_product($cid){
        $product = model('Products');
        return $product->field('Id,name,head_img,number,title,price')->where(['cat_id'=>$cid])->select();
    }

}