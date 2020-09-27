	function checkname(){
	//判断代理商名是否有效
	var name=$( 'input[name=name]').val();
	//alert(name);
		$.get('../cc.php', {name : name},function(str){ 
			if(str==1){
			    $('#nametishi').html('您输入的用户名存在！请重新输入！');   
			}
			else{   
			    $('#nametishi').html('');   
			}
	   	}   , 'json');			
	}

