<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Custom\Guestbook\Controllers;

class IndexController extends \App\Modules\Base\Controllers\FrontendController
{
	public function actionIndex()
	{
		echo 'this guestbook list. ';
		echo '<a href="' . url('add') . '">Goto Add</a>';
	}

	public function actionAdd()
	{
		$this->display();
	}

	public function actionSave()
	{
		$post = array('title' => I('title'), 'content' => I('content'));
		$this->redirect('index');
	}
}

?>
