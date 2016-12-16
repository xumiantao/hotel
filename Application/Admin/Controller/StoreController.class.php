<?php 
namespace Admin\Controller;
use Think\Controller;
class StoreController extends Controller {
    
    /**
     * 门店列表
     * Programmer : manty
     * Date: 12-12  17:10
     */
    public function storeList(){
        $storeModel = D('Admin/Store');
        $storeList = $storeModel-> get_storeList();
        
        $this->assign('store_list', $storeList);
        $this->display('storelist');
    }
    
    /**
     * 门店编辑
     * Programmer : manty
     * Date: 12-13  11:34
     */ 
    public function storeEdit(){
        $storeModel = D('Admin/Store');
        $storeID = I('get.id');
        $storeInfo = $storeModel->get_storeInfo($storeID);
        $data = I('post.');
        if (!empty($data)){
            $result = $storeModel->edit_store($data);
            if ($result){
                $this->success('保存成功!',U('admin/store/storeList'));
            }else{
                $this->error("保存失败！",U('admin/store/storeList'));
            }
        }
        $this->assign('detail', $storeInfo);
        $this->display('storeadd');
    }
    
    
    /**
     * 添加门店
     * Programmer : manty
     * Date: 12-12  17:10
     */
    public function storeAdd(){
        $storeModel = D('Admin/Store');
        $data = I('post.');
        if (!empty($data)){
            if($storeModel->save_store($data)){
                $this->success('添加成功!',U('admin/Store/storeList'));
            }else{
                $this->error("添加失败！",U('admin/Store/storeList'));
            }
        }
        $this->display('storeadd');
    }
}



?>