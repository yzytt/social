<?php
/**
 * 评论相关信息
 */
class CommentViewModel extends ViewModel{
	protected $viewFields =array(
			'comment' =>array(
			'id','message','addtime',
			'_type' => 'LEFT'
			),


			'news' => array(
			'title'=>'title',
			'_on' => 'news.id=comment.news_id'
			),

		);
	}
?>