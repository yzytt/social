<?php
//评论管理模块
class CommentAction extends Action {
    //评论列表页面
    Public function commentList(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if($_SESSION['level']==2){
            $where['user_id']=$_SESSION['u_id'];
        }  
        $comments=D('CommentView');
        $count=$comments->where($where)->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,10);
        $limit=$page->firstRow.','.$page->listRows;
        $list=$comments->where($where)->order('addtime DESC')->limit($limit)->select();
        $this->page=$page->show();
        $this->assign('list',$list);
        $this->display();
    }
    
 
    Public function delete(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if(!isset($_GET['id'])){
            $this->error('非法操作');
        }
        $comment=M('comment');
        $where['id']=$_GET['id'];
        if($comment->where($where)->delete()){
            $this->success('删除成功', U('commentList'));
        }
        else{
            $this->error('删除失败');
        }
        
    } 
    
}