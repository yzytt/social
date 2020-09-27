<?php
//Login登录模块
class LoginAction extends Action {
    //登录页面
    public function login(){
	    $this->display();
    }
    //登录过程
    public function doLogin(){
        $name=$_POST['name'];
        $where['name']=$_POST['name'];
        $password=md5($_POST['password']);    
        $user=M('user');      
        $message=$user->where($where)->find();       
        if(!$name || $message['password']!=$password){
            $this->error('用户名或者账号不正确');
        }
        else{
            $_SESSION['c_name']=$message['name'];
            $_SESSION['c_id']=$message['id'];  
            $_SESSION['u_name']=$message['name'];
            $_SESSION['u_id']=$message['id'];  
            $_SESSION['level']  =   $message['level'];
            $this->success("恭喜您，登陆成功",U('Index/index'));
        }
    }
     
 
    //退出登录
    Public function loginOut(){
        $_SESSION = array(); //清除SESSION值.
        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
            setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();  //清除服务器的sesion文件
        $this->redirect('Index/index');
    }
    
}