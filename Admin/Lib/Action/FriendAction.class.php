<?php
//friend好友管理模块
class friendAction extends Action {
    //好友列表页面
    Public function friendList(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $friend=M('friend');
        $where['user_id']=$_SESSION['u_id'];
        $count=$friend->where($where)->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,7);
        $limit=$page->firstRow.','.$page->listRows;
        $list=$friend->where($where)->limit($limit)->select();
        $this->page=$page->show();
        foreach ($list as $key => $value) {
            $showlabel='';
            $uwhere['id']=$value['friend_id'];
            $list[$key]['name']=M('user')->where($uwhere)->getField('name');
            $label=M('user')->where($uwhere)->getField('label');
            if(strpos($label,'1')!== false){
                $showlabel.=' 体育';
            }
            if(strpos($label,'2')!== false){
                $showlabel.=' 学习';
            }
            if(strpos($label,'3')!== false){
                $showlabel.=' 生活';
            }
            if(strpos($label,'4')!== false){
                $showlabel.=' 音乐';
            }
            $list[$key]['showlabel']=ltrim($showlabel);
        }
        $this->assign('list',$list);
	    $this->display();
    }

    Public function addFriend(){
        $fwhere['where']=$_SESSION['u_id'];
        $flist=M('friend')->where($fwhere)->field('friend_id')->select();
        $farray=array($_SESSION['u_id']);
        foreach ($flist as $key => $value) {
            $farray[]=$value['friend_id'];
        }
        // var_dump($farray);die;
        if(!empty($_POST['type'])){
            $type=$_POST['type'];
            $where['label']=array('like',"%{$type}%");
        }

        $where['level']=2;
        $where['id']=array('not in',$farray);
        $count=M('user')->where($where)->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,7);
        $limit=$page->firstRow.','.$page->listRows;
        $list=M('user')->where($where)->limit($limit)->select();

        foreach ($list as $key => $value) {
            $showlabel='';
            $label=$value['label'];
            if(strpos($label,'1')!== false){
                $showlabel.=' 体育';
            }
            if(strpos($label,'2')!== false){
                $showlabel.=' 学习';
            }
            if(strpos($label,'3')!== false){
                $showlabel.=' 生活';
            }
            if(strpos($label,'4')!== false){
                $showlabel.=' 音乐';
            }
            $list[$key]['showlabel']=ltrim($showlabel);
            
        }
        $this->assign('list',$list);
        // echo "<pre>";
        // var_dump($list);die;
        $this->page=$page->show();
        $this->display();
    }
  

    Public function doAdd(){
        $data['friend_id']=$_GET['id'];
        $data['user_id']=$_SESSION['u_id'];
        if(M('friend')->add($data)){
            $this->success('关注成功', U('friendList'));
        }
        else{
            $this->error('关注失败');
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
        $friend=M('friend');
        $where['id']=$_GET['id'];
        if($friend->where($where)->delete()){
            $this->success('删除成功', U('friendList'));
        }
        else{
            $this->error('删除失败');
        }
    }     
}