<?php
//zend by QQ:1527200768  鸿宇科技  禁止倒卖 一经发现停止任何服务
namespace App\Providers;

class AuthServiceProvider extends \Illuminate\Support\ServiceProvider
{
	public function register()
	{
	}

	public function boot()
	{
		$this->app['auth']->viaRequest('api', function($request) {
			if ($request->input('api_token')) {
				return \App\Models\Users::where('api_token', $request->input('api_token'))->first();
			}
		});
	}
}

?>
