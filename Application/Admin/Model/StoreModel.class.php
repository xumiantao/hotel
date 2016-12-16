<?php 
namespace Admin\Model;
use Think\Model;
class StoreModel extends Model {
    
    public function get_storeList(){
        $Model = M('store');
        $storeList = $Model->select();
        return $storeList;
    }
    
    public function get_storeInfo($storeID){
        $Model = M('store');
        $storeInfo = $Model->where(array('id'=>$storeID))->find();
        return $storeInfo;
    }
    
    public function save_store($data){
        $Model = M('store');
        if ($Model->add($data)){
            return true;
        }else{
            return false;
        }
    }
    
    public function edit_store($data){
        $Model = M('store');
        if ($Model->save($data)){
            return true;
        }else{
            return false;
        }
    }
}