<?php
/**
 * 代理商区域名称
 */
class CommentViewModel extends ViewModel{
	protected $viewFields =array(
			'comment' =>array(
			'co_id','co_message','co_addtime','co_status',
			'_type' => 'LEFT'
			),

			'customer' => array(
			'c_name'=>'co_name',
			'_on' => 'comment.co_customer_id=customer.c_id'
			),


				
		);
	}
?>