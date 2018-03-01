<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Repositories\Bonus;

class BonusTypeRepository implements \App\Contracts\Repositories\Bonus\BonusTypeRepositoryInterface
{
	public function bonusInfo($bonus_id, $bonus_sn = '')
	{
		return self::join('user_bonus', 'bonus_type.type_id', '=', 'user_bonus.bonus_type_id')->where('bonus_id', $bonus_id)->first();
	}
}

?>
