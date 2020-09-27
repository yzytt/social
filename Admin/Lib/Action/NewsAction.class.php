<?php
//News公告动态管理模块


class NewsAction extends CommonAction {
    public $type=array(
            array('id'=>'1','name'=>'体育'),
            array('id'=>'2','name'=>'学习'),
            array('id'=>'3','name'=>'生活'),
            array('id'=>'4','name'=>'音乐')
    );
     //公告列表页面
    Public function NoticeList(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $news=M('news');
        $where['type']=0;
        $count=$news->where($where)->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,7);
        $limit=$page->firstRow.','.$page->listRows;
        $this->list=$news->where($where)->order('addtime DESC')->limit($limit)->select();
        $this->page=$page->show();
        $this->display();
    }
    //公告发布页面
    Public function publishNotice(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $this->display();
    }
    //公告发布过程
    Public function dopublish(){
        if(!isset($_POST['title'])){
            $this->error('非法操作');
        }
        if(empty($_POST['title'])){
            $this->error('公告名称不能为空');
        }
        $news=M('news');
        $data['title']    =   $_POST['title'];
        $data['message']  =   $_POST['message'];
        $data['type']     =   0;
        $data['author']   =   $_SESSION['u_id'];
        $data['pic']      =   $_POST['pic'];
        $data['addtime']  =   time();    
        if($news->data($data)->add()){
            $this->success('发布成功',U('NoticeList'));
        }
        else{
            $this->error('发布失败');
        }

    }
    //公告修改页面
    Public function updateNotice(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if(!isset($_GET['id'])){
            $this->error('非法操作');
        }
        $news=M('news');
        $where['id']=$_GET['id'];
        $this->list=$news->where($where)->find();
        $this->display();
    }
    //公告修改过程
    Public function doupdate(){
        if(!isset($_POST['id'])){
            $this->error('非法操作');
        }
        $news=M('news');
        $news->create();
        $where['id']=$_POST['id'];
        if($news->where($where)->save()){
            $this->success('修改成功', U('NoticeList'));
        }
        else{
            $this->error('修改失败');
        }
    }

   //删除过程
    Public function deleteNotice(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if(!isset($_GET['id'])){
            $this->error('非法操作');
        }
        $news=M('news');
        $where['id']=$_GET['id'];
        if($news->where($where)->delete()){
            $this->success('删除成功', U('NoticeList'));
        }
        else{
            $this->error('删除失败');
        }
    }


    //动态列表页面
    Public function newsList(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $news=M('news');
        if($_SESSION['level']==2){
            $where['author']=$_SESSION['u_id'];
        }      
        $count=$news->where($where)->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,17);
        $limit=$page->firstRow.','.$page->listRows;
        $list=$news->where($where)->order('addtime DESC')->limit($limit)->select();

        foreach ($list as $key => $value) {
            $uwhere['id']=$value['author'];
            $list[$key]['author_name']=M('user')->where($uwhere)->getField('name');
        }
        $this->assign('list',$list);
        $this->page=$page->show();
	    $this->display();
    }
    //动态发布页面
    Public function publishNews(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $this->list=$this->type;

        $this->display();
    }
    //动态发布过程
    Public function publish(){
        if(!isset($_POST['title'])){
            $this->error('非法操作');
        }
        if(empty($_POST['title'])){
            $this->error('动态名称不能为空');
        }
        $news=M('news');
        $data['title']    =   $_POST['title'];
        $data['message']  =   $_POST['message'];
        $data['type']     =   $_POST['type'];
        $data['pic']      =   $_POST['pic'];
        $data['author']   =   $_SESSION['u_id'];
        $data['addtime']  =   time();    
        if($news->data($data)->add()){
            $this->success('发布成功',U('newsList'));
        }
        else{
            $this->error('发布失败');
        }

    }
    //动态修改页面
    Public function updateNews(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if(!isset($_GET['id'])){
            $this->error('非法操作');
        }
        $news=M('news');
        $type=M('type');
        $where['id']=$_GET['id'];
        $this->list=$news->where($where)->find();
        $this->t_list=$type->select();
        $this->display();
    }
    //动态修改过程
    Public function update(){
        if(!isset($_POST['id'])){
            $this->error('非法操作');
        }
        $news=M('news');
        $news->create();
        $where['id']=$_POST['id'];
        if($news->where($where)->save()){
            $this->success('修改成功', U('newsList'));
        }
        else{
            $this->error('修改失败');
        }
    }

   //删除过程
    Public function delete(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        if(!isset($_GET['id'])){
            $this->error('非法操作');
        }
        $news=M('news');
        $where['id']=$_GET['id'];
        if($news->where($where)->delete()){
            $this->success('删除成功', U('newsList'));
        }
        else{
            $this->error('删除失败');
        }
    }

      Public function add_picture() {
        $size = 500000000;
        $ext = array('jpg', 'bmp', 'png', 'jpeg');
        $path = './Upload/c_picture/';
        $name = 'pic_';
        $maxwidth = 1000;
        $maxheight = 1000;
        $info = $this->upload($size, $ext, $path, $name, $maxwidth, $maxheight ,$rule = true);

        if ($info[0] == 0) {
           return  $this->ajaxReturn('', $info[1], 0);
        } else {
           return  $this->ajaxReturn('', $name . $info[0]['savename'], 1);
        }

    }

    
}