<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Notifications;

abstract class Notification
{
	protected $via = array();

	public function send()
	{
		foreach ($this->via as $via) {
		}
	}
}


?>
