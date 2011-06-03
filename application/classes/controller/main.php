<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Abstract_Controller_Website {

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

	public function action_gearman_client()
	{
		$client= new GearmanClient();
		$client->addServer();

		$result = $client->do('example_job', 'some-stuff');

		if ($client->returnCode() != GEARMAN_SUCCESS)
		{
			echo 'bad return code<br />';
			exit;
		}

		// This job communicates with JSON because I <3 JSON.
		echo Debug::vars(json_decode($result));
		echo 'done!<br />';die;
	}

	public function action_gallery() {}
}
