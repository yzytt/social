<?php
//注册模块
class RegisterAction extends Action {

    //注册页面
    Public function register(){
        $this->display();
    }
    //注册过程
    Public function doRegister(){
        if(empty($_POST['name'])){
            $this->error('注册失败！');
        }
        
        $user=M('user');      
        $data['name']=$_POST['name'];
        $data['password']=md5($_POST['password']);
        $data['label']=implode($_POST['label'],',');
        $data['level']=2;
        if($user->add($data)){
            $this->success('注册成功', U('Login/login'));
        }else{
            $this->error('注册失败！');
        }       
    }
     
  
    
}