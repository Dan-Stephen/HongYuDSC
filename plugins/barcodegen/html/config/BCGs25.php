<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
function customSetup($barcode, $get)
{
	if (isset($get['checksum'])) {
		$barcode->setChecksum($get['checksum'] === '1' ? true : false);
	}
}

$classFile = 'BCGs25.barcode.php';
$className = 'BCGs25';
$baseClassFile = 'BCGBarcode1D.php';
$codeVersion = '5.2.0';

?>
