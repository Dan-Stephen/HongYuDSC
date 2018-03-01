<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace OSS\Result;

class UploadPartResult extends Result
{
	protected function parseDataFromResponse()
	{
		$header = $this->rawResponse->header;

		if (isset($header['etag'])) {
			return $header['etag'];
		}

		throw new \OSS\Core\OssException('cannot get ETag');
	}
}

?>
