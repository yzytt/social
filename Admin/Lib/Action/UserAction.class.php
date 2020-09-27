<?php
//user用户管理模块
class UserAction extends Action {
    //用户列表页面
    Public function userList(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $user=M('user');
        $where['level']==2;
        $count=$user->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,7);
        $limit=$page->firstRow.','.$page->listRows;
        $list=$user->limit($limit)->select();
        $this->page=$page->show();
        $this->assign('list',$list);
	    $this->display();
    }
  
    //删除过程
    Public function delete(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if(!isset($_GET['id'])){
            $this->error('非法操作');
        }
        $user=M('user');
        $where['id']=$_GET['id'];
        if($user->where($where)->delete()){
            $this->success('删除成功', U('userList'));
        }
        else{
            $this->error('删除失败');
        }
    }     
}