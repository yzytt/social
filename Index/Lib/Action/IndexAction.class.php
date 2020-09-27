<?php
class IndexAction extends Action {
	 public $type=array(
	 		array('id'=>'0','name'=>'公告'),
            array('id'=>'1','name'=>'体育'),
            array('id'=>'2','name'=>'学习'),
            array('id'=>'3','name'=>'生活'),
            array('id'=>'4','name'=>'音乐')
    );
	Public function index(){
		$cname=$_SESSION['c_name'];
		$this->redirect("newsList?id=0&&c_name=$cname");
	}
	
	//新闻列表页面
	Public function newsList(){
		// var_dump($_SESSION['c_name']);
		$t_list=$this->type;
		$where['type']=$_GET['id'];
		$news=M('news');		
 		$count=$news->where($where)->count('id');
        import('ORG.Util.Page');//导入分页类
        $page=new page($count,10);
        $limit=$page->firstRow.','.$page->listRows;
        $this->n_list=$news->where($where)->limit($limit)->select();
        $this->assign('typeid',$_GET['id']);
		$this->assign('t_list',$t_list);
		$this->assign('c_name',$_SESSION['c_name']);
        $this->page=$page->show();		
		$this->display();
	}

	//新闻详情页面
	Public function message(){
		$this->t_list=$this->type;
		
		$where['id']=$_GET['id'];
		$news=M('news');
		$newslist=$news->where($where)->find();
		$uwhere['id']=$newslist['author'];
		$this->author=M('user')->where($uwhere)->getField('name');
		// var_dump($uwhere['id']);

		/*新闻评论 开始*/
		$this->assign('news',$newslist);
		$comment=M('comment');
		$count=$comment->where("news_id ='".$_GET['id']."'")->count('id');
		import('ORG.Util.Page');    //导入分页类
        $page=new page($count,10);
        $limit=$page->firstRow.','.$page->listRows;
		$c_list=$comment->where("news_id ='".$_GET['id']."'")->order('addtime DESC')->limit($limit)->select();
		foreach ($c_list as $key => $value) {
			$userwhere['id']=$value['user_id'];
			$c_list[$key]['name']=M('user')->where($userwhere)->getField('name');
		}
		$this->assign('c_list',$c_list);
		$this->page=$page->show();	
		$this->assign('c_name',$_SESSION['c_name']);
		$this->display();
	}

	//异步发布评论功能
	Public function addComment(){
		$data['news_id']	=	$_POST['id'];
		$data['message']	=	$_POST['message'];
		$data['user_id']	=	$_SESSION['c_id'];
		$data['addtime']	=	time();
		$comment=M('comment');
		if($lastid=$comment->add($data)){
			echo $lastid;
		}

	}


	Public function zan(){
		$where['id']=$_POST['id'];
		if(M('news')->where($where)->setInc('nums')){
			echo 1;
		}
	}


}
?>