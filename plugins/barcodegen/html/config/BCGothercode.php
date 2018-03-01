<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
function customSetup($barcode, $get)
{
	if (isset($get['label'])) {
		$barcode->setLabel($get['label']);
	}
}

$classFile = 'BCGothercode.barcode.php';
$className = 'BCGothercode';
$baseClassFile = 'BCGBarcode1D.php';
$codeVersion = '5.2.0';

?>
