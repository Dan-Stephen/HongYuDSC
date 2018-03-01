<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace OSS\Result;

class InitiateMultipartUploadResult extends Result
{
	protected function parseDataFromResponse()
	{
		$content = $this->rawResponse->body;
		$xml = simplexml_load_string($content);

		if (isset($xml->UploadId)) {
			return strval($xml->UploadId);
		}

		throw new \OSS\Core\OssException('cannot get UploadId');
	}
}

?>
