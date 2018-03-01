<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Services;

class WxappService
{
	private $WxappConfigRepository;

	public function __construct(\App\Repositories\Wechat\WxappConfigRepository $WxappConfigRepository)
	{
		$this->WxappConfigRepository = $WxappConfigRepository;
	}

	public function getWxappConfig()
	{
		return $this->WxappConfigRepository->getWxappConfig();
	}

	public function getWxappConfigByCode($code)
	{
		return $this->WxappConfigRepository->getWxappConfigByCode($code);
	}
}


?>
