<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Api\Controllers\Article;

class CategoryController extends \App\Api\Controllers\Controller
{
	protected $category;

	public function __construct(\App\Repositories\Article\CategoryRepository $category)
	{
		$this->category = $category;
	}

	public function index()
	{
		return $this->category->all();
	}

	public function show($id)
	{
		return $this->category->detail($id);
	}
}

?>
