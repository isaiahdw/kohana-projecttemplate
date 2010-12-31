<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Website {

	public function action_index() {}

	public function action_yform()
	{
		$this->view->bind('values', $_POST);
	}

	public function action_notices()
	{
		Notices::add('success', 'some.message');
		Notices::add('error', 'some.message');
		Notices::add('warning', 'some.message');
	}
}
