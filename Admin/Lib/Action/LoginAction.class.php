<?php
//Login登录模块
class LoginAction extends Action {
    //登录页面
    public function login(){
	    $this->display();
    }
    //登录过程
    public function doLogin(){
        if(!$this->isPost()) halt('页面不正确');
        /*验证码判断，thinkphp自带验证码功能会将验证码md5加密，存入session，判断前需要处理验证码*/
 
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
            redirect(__APP__);
        }
    }

    public function register(){
        $this->display();
    }

    public function doRegister(){
        $data['name']=$_POST['name'];
        $data['password']=md5($_POST['password']);
        $data['label']=implode($_POST['label'],',');
        $data['level']=2;
        $user=M('user');
        if($user->add($data)){
           $this->success('注册成功',U('login'));
        }else{
            $this->error('注册失败');
        }
    }
 
    //退出登录
    Public function loginOut(){
        $_SESSION = array(); //清除SESSION值.
        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
            setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();  //清除服务器的sesion文件
        $this->redirect('Login/login');
    }
    
}