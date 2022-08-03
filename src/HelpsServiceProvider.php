<?php

namespace Dcat\Admin\Helps;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class HelpsServiceProvider extends ServiceProvider
{
	protected $js = [
	    'js/jquery.slimscroll.min.js',
    ];
	protected $css = [
	];
	
	protected $menu = [
// 	    [
// 	        'title'     => 'Database terminal',
// 	        'icon'      => 'fa-database',
// 	        'uri'       => 'helpers/terminal/database',
// 	    ],
	    [
	        'title' => 'Helps',
	        'uri'   => '',
	        'icon'  => 'fa-gears', //
	    ],
	    [
	        'parent' => 'Helps', // 指定父级菜单
	        'title'     => 'Laravel artisan',
	        'icon'      => 'fa-terminal',
	        'uri'       => 'helpers/terminal/artisan',
	    ],
	    [
	        'parent' => 'Helps', // 指定父级菜单
	        'title'     => 'Log viewer',
	        'icon'      => 'fa-database',
	        'uri'       => 'helpers/logs',
	    ],
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		//
		
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
