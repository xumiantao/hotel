<?php 
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller {
    
    /**
     * 产品列表
     * Programmer : manty
     * Date: 12-11  19:16
     */
    public function productList(){
        $productModel = D('Admin/Product');
        $productList = $productModel->get_productList();
        
        $this->assign('product_list', $productList);
        $this->display('list');
    }
    
    /**
     * 产品详情
     * Programmer : manty
     * Date: 12-12  11:46
     */
    public function productDetail(){
        $productModel = D('Admin/Product');
        $id = I('get.id');
        $productInfo = $productModel->get_productInfo($id);
        $productInfo['catename'] = $productModel->get_catename($productInfo['categore']);
        $data = I('post.');
        if(!empty($data)){
            $result = $productModel->edit_product($data);
            if ($result){
                $this->success('保存成功!',U('admin/product/productList'));
            }else{
                $this->error("保存失败！",U('admin/product/productList'));
            }
        }
        $this->assign('detail', $productInfo);
        $this->display('add');
    }
    
    /**
     * 添加商品
     * Programmer : manty
     * Date: 12-11  19:16
     */
    public function productAdd(){
        $productModel = D('Admin/Product');
        $cateList = $productModel->get_cateList();
        $images = empty($_FILES['images']) ? '' : $_FILES['images'];
        $data = I('post.');
        if (!empty($data)){
            $upload = new \Think\Upload();
            $upload->maxSize = (1024*1024)*2;
            $upload->allowExts  = array(
                'jpg', 'gif', 'png', 'jpeg'
            );
            $upload->savePath = 'Public/product/';
            $upload->replace = true;
            $upload->autoSub = false;
            $imginfo = $upload->upload();
            if (empty($imginfo)){
                $this->error($upload->getError());
            }else{
                $result = $productModel->save_product($data,$imginfo['images']['savename']);
                if($result){
                    $this->success('添加成功!',U('admin/product/productList'));
                }else{
                    $this->error("添加失败！",U('admin/product/productList'));
                }
            }
        }
        
        $this->assign('cate_list', $cateList);
        $this->display('add');
    }
    
    /**
     * 商品分类列表
     * Programmer : manty
     * Date: 12-11  19:16
     */
    public function cateList(){
        $productModel = D('Admin/Product');
        $cateList = $productModel->get_cateList();
        echo time();
        $this->assign('cate_list', $cateList);
        $this->display('catelist');
    }
    
    /**
     * 添加商品分类
     * Programmer : manty
     * Date: 12-11  19:16
     */
    public function cateAdd(){
        $productModel = D('Admin/Product');
        $catename = I('post.catename');
        $cateimg = empty($_FILES['cateimg']) ? '' : $_FILES['cateimg'];
        if (!empty($catename)){
            $upload = new \Think\Upload();
            $upload->maxSize = (1024*1024)*2;
            $upload->allowExts  = array(
                'jpg', 'gif', 'png', 'jpeg'
            );
            $upload->savePath = 'Public/cate/';
            $upload->replace = true; 
            $upload->autoSub = false;
            $imginfo = $upload->upload();
            if (empty($imginfo)){
                $this->error($upload->getError());
            }else{
                $result = $productModel->save_cate($catename,$imginfo['cateimg']['savename']);
                if($result){
                    $this->success('添加成功!',U('admin/product/cateList'));
                }else{
                    $this->error("添加失败！",U('admin/product/cateList'));
                }
            }
        }
        $this->display('cateadd');
    }
    
    /**
     * 下架商品
     * Programmer : manty
     * Date: 12-12  14:14
     */
    public function ajax_product_revoked(){
        $product_id = I('post.id');
        $Model = M('product');
        $content = array(
            'id' => $product_id,
            'is_shelves' => 1,
        );
        if ($Model->save($content)){
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 删除商品
     * Programmer : manty
     * Date: 12-11  16:00
     */
    public function ajax_product_delete(){
        $product_id = I('post.id');
        $Model = M('product');
        if ($Model->where(array('id'=>$product_id))->delete()){
            $return = array(
                'state' => true,
            );
        }else{
            $return = array(
                'state' => false,
            );
        }
        exit(json_encode($return));
    }
    
    /**
     * 删除分类
     * Programmer : manty
     * Date: 12-11  16:00
     */
    public function ajax_cate_delete(){
        $cate_id = I('post.id');
        $Model = M('product_cate');
        if ($Model->where(array('id'=>$cate_id))->delete()){
            $return = array(
                'state' => true,
            );
        }else{
            $return = array(
                'state' => false,
            );
        }
        exit(json_encode($return));
    }
    
}



?>