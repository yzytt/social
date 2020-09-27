<?php

$config = require './config.php'; //加载公共配置文件


        
$index_config = array(


        'DEFAULT_THEME' => 'default', //默认模板主题名称
         'TMPL_PARSE_STRING'=>array(
    
        '__PUBLIC__' =>__ROOT__.'/'.APP_NAME.'/Tpl/default/Public' ,
    
    ),

);

return array_merge($config,$index_config); //将两个数组合并成一个数组

?>