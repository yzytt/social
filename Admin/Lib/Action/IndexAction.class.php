<?php

class IndexAction extends CommonAction {

    Public function index(){  
    // var_dump($_SESSION['u_id']);die;  
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        // var_dump($_SESSION['u_name'],$_SESSION['c_name']);die;
        $this->assign('u_name',$_SESSION['u_name']);   
        $this->assign('level',$_SESSION['level']);        
        $this->display();

    }
   
    //系统首页服务器配置信息
    Public function sysMessage(){
        if(!isset($_SESSION['u_id'])){
            $this->redirect('Login/login');
        }
        $this->systemMsg=systemMsg(); 
        $this->display();
    }
   
    
}