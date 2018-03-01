<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Repositories\Payment;

class PaymentRepository implements \App\Contracts\Repositories\Payment\PaymentRepositoryInterface
{
	public function paymentList()
	{
		$payment = \App\Models\Payment::select('pay_id', 'pay_code', 'pay_name', 'pay_fee', 'pay_desc', 'pay_config', 'is_cod')->where('enabled', 1)->get()->toArray();
		return $payment;
	}
}

?>
