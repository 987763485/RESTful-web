<?php
/**
 * Created by.
 * Author: wanxin
 * Email: 987763485@qq.com
 * Date: 2019/1/2
 * Time: 0:11
 */

namespace app\web\controller;


use app\common\model\ProductCat;
use app\common\model\Products as ProductsModel;
use app\common\model\Products;

class Product extends HomeBaseController
{
    public function Index($cur = 12,$order = 'hot',$cate = 0){
        $cateArr = $this->getCateID($cate);
        $where['cat_id'] = array('in',$cateArr);
        $where['status'] = array('eq',1);
        $products = new ProductsModel();
        $productArr = $products->field('Id,name,head_img,number,title,price')->where($where)->order($order,'desc')->paginate($cur);
        $page = $productArr->render();
        $this->assign('cate',$cate);
        $this->assign('order',$order);
        $this->assign('currentPage',$productArr->currentPage());
        $this->assign('lastPage',$productArr->lastPage());
        $this->assign('productArr',$productArr);
        $this->assign('page', $page);
        return $this->fetch();
    }

    public function getOne($id){
        $product = new Products();
        $data = $product::with('cat')->find($id);
        $this->assign('product',$data);
        return $this->fetch('detail');
    }


    //根据父类Id取得所有包含分类的Id，返回一个数组
    public function getCateID($id){
        $category = new ProductCat();
        $res =  $category->order('weight','desc')->select()->toArray();
        return get_cate_array($res,$id);
    }

}