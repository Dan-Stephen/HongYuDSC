<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Repositories\Bonus;

class UserBonusRepository implements \App\Contracts\Repositories\Bonus\UserBonusRepositoryInterface
{
	public function getUserBonusCount($userId)
	{
		return \App\Models\UserBonus::where('user_id', $userId)->count();
	}
}

?>
