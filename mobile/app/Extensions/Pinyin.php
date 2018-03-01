<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Extensions;

class Pinyin
{
	public function output($str, $utf8 = true)
	{
		$pinyin = new \Overtrue\Pinyin\Pinyin();
		return $pinyin->convert($str);
	}
}


?>
