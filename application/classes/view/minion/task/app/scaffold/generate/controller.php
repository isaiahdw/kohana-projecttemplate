<?php defined('SYSPATH') or die('No direct script access.');

class View_Minion_Task_App_Scaffold_Generate_Controller extends Kostache {

	public $class_path;
	public $actions;

	public function actions()
	{
		$data = array();
		foreach ($this->actions as $action)
		{
			$data[] = array('action' => $action);
		}
		return $data;
	}
}