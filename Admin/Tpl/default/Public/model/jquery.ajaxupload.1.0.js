// 制作jQuery插件 author：xiajun  add 2012-08-13 ajax多文件上传
;(function($){
	$.extend({
		createUploadIframe:function(id,url){// 创建用于文件上传的iframe
			var upIframeId = "jqAjaxUploadIframe" + id;
			var jqIfrmObj = $('<iframe id="' + upIframeId + '" name="' + upIframeId + '" />');
			
			// iframe的位置
			jqIfrmObj.css('position','absolute');
			jqIfrmObj.css('top','-1000px');
			jqIfrmObj.css('left','-1000px');
			jqIfrmObj.attr('src',url);
			
			$('body').append(jqIfrmObj);
			return jqIfrmObj;
		},
		createUploadForm:function(timeId,fileElems,dataType){// 创建用于上传文件的form
			var upFormId = "jqAjaxUploadFrom" + timeId;
			var jqFormObj = $('<form  action="" method="POST" name="' + upFormId + '" id="' + upFormId + '" enctype="multipart/form-data"></form>');
			
			for (var i = 0,len = fileElems.length;i < len;i++){
				var fileElemObj = fileElems[i],
					fileId = 'jqUploadFile' + timeId + fileElemObj,
					oldElem = $('#' + fileElemObj),
					newElem = $(oldElem).clone();
					
				$(oldElem).attr('id',fileId);
				$(oldElem).before(newElem);
				$(oldElem).appendTo(jqFormObj);
			}
			
			// 数据返回类型
			var dataTpIpt = $("<input type='hidden' id='dataTp' name = 'dataTp'/>");
			dataTpIpt.val(dataType);
			jqFormObj.append(dataTpIpt);
			
			$(jqFormObj).css('position', 'absolute');
			$(jqFormObj).css('top', '-1200px');
			$(jqFormObj).css('left', '-1200px');
			$(jqFormObj).appendTo('body');	
			
			return jqFormObj;		
		},
		createOverLay:function(){// 创建遮罩效果 
			var overLayDiv = $("<div></div>");
			overLayDiv.attr("id","up_overlay");
			overLayDiv.css("display","block");
			overLayDiv.css("height","100%");
			overLayDiv.css("width","100%");
			overLayDiv.css("left","0px");
			overLayDiv.css("top","0px");
			overLayDiv.css("position","fixed");
			overLayDiv.css("z-index","999");
			overLayDiv.css("background-color","#000000");
			overLayDiv.css("opacity","0.59");
			overLayDiv.css("filter","Alpha(opacity=50)");
			$("body").append(overLayDiv);
		},
		createLoadingPic:function(loadPicUrl){// 创建正在加载的图片
			var oLoadingPic = $("<img></img>");
			oLoadingPic.attr("id","loadimg");
			oLoadingPic.css("left","0px");
			oLoadingPic.css("top","0px");
			oLoadingPic.css("margin-left","280px");
			oLoadingPic.css("margin-top","150px");
			oLoadingPic.css("position","fixed");
			oLoadingPic.css("z-index","999");
			oLoadingPic.css("display","block");
			
			oLoadingPic.attr("src",loadPicUrl);
			
			$("body").append(oLoadingPic);
		},
		ajaxFileUpload:function(oJson){// 文件上传方法
			// 遮罩效果 start
			jQuery.createOverLay();
			jQuery.createLoadingPic(oJson.loadPicUrl);
			// 遮罩效果 end
			
			// 创建用于上传文件的iframe和form start
			var timeId = new Date().getTime();
			var upfForm = jQuery.createUploadForm(timeId,oJson.formElemIds,oJson.dataType);
			    upfIframe = jQuery.createUploadIframe(timeId,oJson.url),
				upfFormId = "jqAjaxUploadFrom" + timeId,
				upfIframeId = "jqAjaxUploadIframe" + timeId;
			// 创建用于上传文件的iframe和form end
				
			// 上传文件的回调函数 start
			var xml = {};
			var uploadFileCallback = function(){
				var cbUpfIfrm = $("#" + upfIframeId);
				try{
					xml = cbUpfIfrm.contents().find("body");
					
					var sErrFlag = $.trim(cbUpfIfrm.contents().find("body").find("input[id='errFlag']").val()),
						sTipInfo = $.trim(cbUpfIfrm.contents().find("body").find("input[id='errInfo']").val());
					
					if (sErrFlag == 'false'){
						if (oJson.error){
							oJson.error(sTipInfo);	
						}
					}else if (sErrFlag == 'true'){
						var retData = jQuery.uploadRetHttpData(xml,oJson.dataType);
						
						if (oJson.success){
							$("#up_overlay").remove();
							$("#loadimg").remove();
							oJson.success(retData);	
						}						
					}
					
					$(cbUpfIfrm).unbind();
					
					setTimeout(function(){
						$(upfIframe).remove();
						$(upfForm).remove();
					},100);					
							
					xml = null;		
				}catch(e){
					alert("Callback error1:" + e);	
				}

			}
			// 上传文件的回调函数 end
			
			try{
				var ajaxUpfForm = $("#" + upfFormId);
				ajaxUpfForm.attr("action",oJson.url);
				ajaxUpfForm.attr("method","post");
				ajaxUpfForm.attr("target",upfIframeId);
				
				if (ajaxUpfForm.attr("encoding")){
					ajaxUpfForm.attr("encoding","multipart/form-data");
				}else{
					ajaxUpfForm.attr("enctype","multipart/form-data");	
				}
				
				ajaxUpfForm.submit();
			}catch(e){
				alert("ajaxFileUpload Error:" + e);
			}
			
			$("#" + upfIframeId).bind("load",uploadFileCallback);
			
			return {abort: function () {}};	
		},
		uploadRetHttpData:function(resp,type){// 上传返回的数据
			switch (type) {
				case 'html':
					return resp.find("div[id='resultData']").html();
					break;
				case 'xml':
					alert("to do ....");// 以后再写
					break;
				case 'json':
					return eval("(" + resp.find("div[id='resultData']").text() + ")");
					break;
				case 'script':
					alert("to do ....");// 以后再写
					break;
				default:
					break;
			}
		}
	});
})(jQuery);