<?php defined('SYSPATH') or die('No direct script access.');

class View_Page_Admin_Index extends View_Page
{
	protected $_layout = 'layout/admin/one_column';

	public $title = 'Admin Theme';

	public function _initialize()
	{
		Assets::add_group('admin-theme');
	}

	public function main_navigation()
	{
		return array(
			array(
				'url'  => '#',
				'text' => 'Link One',
			),
			array(
				'url'  => '#',
				'text' => 'Link Two',
			),
			array(
				'url'  => '#',
				'text' => 'Link Three',
			),
			array(
				'url'  => '#',
				'text' => 'Link Four',
			),
		);
	}

	public function auth_navigation()
	{
		return array(
			array(
				'url'  => '#',
				'text' => 'Log In',
			),
			array(
				'url'  => '#',
				'text' => 'Register',
			),
		);
	}

	public function section_navigation()
	{
		return array(
			array(
				'url'  => '#',
				'text' => 'List',
			),
			array(
				'url'  => '#',
				'text' => 'Create',
			),
		);
	}

	public function footer_navigation()
	{
		return array(
			array(
				'url'  => '#',
				'text' => 'About Us',
			),
			array(
				'url'  => '#',
				'text' => 'Contact',
			),
		);
	}

	public function has_main_navigation()
	{
		return (bool) count($this->main_navigation());
	}

	public function has_auth_navigation()
	{
		return (bool) count($this->auth_navigation());
	}

	public function has_section_navigation()
	{
		return (bool) count($this->section_navigation());
	}

	public function has_footer_navigation()
	{
		return (bool) count($this->footer_navigation());
	}
}
