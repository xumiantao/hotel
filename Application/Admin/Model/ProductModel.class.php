<?php 
namespace Admin\Model;
use Think\Model;
class ProductModel extends Model {
    
    public function get_productList(){
        $Model = M('product');
        $productList = $Model->select();
        foreach ($productList as $key=>$value){
            $productList[$key]['categore'] = self::get_catename($productList[$key]['categore']);
            if ($productList[$key]['is_shelves'] == 0){
                $productList[$key]['is_shelves'] = '<button class="btn btn-info btn-circle"><i class="fa fa-check"></i></button>';
            }else{
                $productList[$key]['is_shelves'] = '<button class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button>';
            }
        }
        return $productList;
    }
    
    public function get_productInfo($productID){
        $Model = M('product');
        $detail = $Model->where(array('id'=>$productID))->find();
        return $detail;
    }
    
    public function edit_product($data){
        $Model = M('product');
        if ($Model->save($data)){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_cateList(){
        $Model = M('product_cate');
        $cateList = $Model->select();
        return $cateList;
    }
    
    public function get_catename($cateID){
        $Model = M('product_cate');
        $catename = $Model->where(array('id'=>$cateID))->getField('catename');
        return $catename;
    }
    
    public function save_product($data,$images){
        $Model = M('product');
        $content = array(
            'name' => $data['name'],
            'categore' => $data['categore'],
            'integral' => $data['integral'],
            'market_price' => $data['market_price'],
            'content' => $data['content'],
            'images' => $images,
            'code' => time(),
            'stock' => $data['stock'],
        );
        if ($Model->add($content)){
            return true;
        }else{
            return false;
        }
    }
    
    public function save_cate($catename,$cateimg){
        $Model = M('product_cate');
        $content = array(
            'catename' => $catename,
            'cateimg' => $cateimg
        );
        if ($Model->add($content)){
            return true;
        }else{
            return false;
        }
    }
}



?>