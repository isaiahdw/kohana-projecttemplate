<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The generate task provides an easy way to create MVC files
 *
 * Available config options are:
 *
 * --name=path/to/file
 *
 *  This is a required config option, use it specify in which location the 
 *  files should be created.  You can specify a simple name (e.g. user)
 *  or you can specify a path to the name (e.g. --name=user/admin).
 *
 * --actions=list,of,actions
 *
 *  This is an optional config option, use it to specify the actions to create
 *  in the controller as well as the views and templates that should be
 *  generated (e.g. --actions=create,edit,delete). If you leave this blank, it
 *  will default to 'index'.
 *
 * @author Synapse Studios <info@synapsestudios.com>
 */
class Minion_Task_App_Scaffold_Generate extends Minion_Task {

	/**
	 * A set of config options that this task accepts
	 * @var array
	 */
	protected $_config = array(
		'name',
		'actions',
	);

	public function execute(array $config)
	{
		if (empty($config['name']))
			return 'Please provide --name'.PHP_EOL;

		if (empty($config['actions']))
		{
			$actions[] = 'index';
		}
		else
		{
			$actions = explode(',', strtolower($config['actions']));
		}
		// Remove spaces from name
		$name = trim(str_replace(' ', '', $config['name']), '/');

		$controller_path = APPPATH.'classes'.DIRECTORY_SEPARATOR.'controller';
		$view_path = APPPATH.'classes'.DIRECTORY_SEPARATOR.'view';
		$template_path = APPPATH.'templates';

		if ( ! is_dir($controller_path) OR ! is_dir($view_path) OR ! is_dir($template_path))
			return 'Unable to verify directories exist for controller, view and template'.PHP_EOL;

		$name_parts = explode('/', $name);
		$file_path = '';
		$class_path = '';
		if (count($name_parts) > 1)
		{
			$class_name = ucfirst(array_pop($name_parts));
			$file_name = strtolower($class_name);
			foreach ($name_parts as $directory)
			{
				$class_path .= ucfirst($directory).'_';
				$file_path .= strtolower($directory).DIRECTORY_SEPARATOR;
			}

			$controller_path .= DIRECTORY_SEPARATOR.$file_path;
			$view_path .= DIRECTORY_SEPARATOR.$file_path.DIRECTORY_SEPARATOR.$file_name;
			$template_path .= DIRECTORY_SEPARATOR.$file_path.DIRECTORY_SEPARATOR.$file_name;

			if ( ! is_dir($controller_path) AND ! mkdir($controller_path, 0755, TRUE))
				return 'Faild to create path in controller directory'.PHP_EOL;

			if ( ! is_dir($view_path) AND ! mkdir($view_path, 0755, TRUE))
				return 'Faild to create path in view directory'.PHP_EOL;

			if ( ! is_dir($template_path) AND ! mkdir($template_path, 0755, TRUE))
				return 'Faild to create path in template directory'.PHP_EOL;
		}
		else
		{
			$class_name = ucfirst($name);
			$file_name = strtolower($class_name);
		}

		if ( ! file_exists($controller_path.DIRECTORY_SEPARATOR.$file_name.'.php'))
		{
			$controller = Kostache::factory('minion/task/app/scaffold/generate/controller')
				->set('class_path', $class_path.$class_name)
				->set('actions', $actions);
			file_put_contents($controller_path.DIRECTORY_SEPARATOR.$file_name.'.php', $controller->render());
		}

		foreach ($actions as $action)
		{
			if ( ! file_exists($view_path.DIRECTORY_SEPARATOR.$action.'.php'))
			{
				$view = Kostache::factory('minion/task/app/scaffold/generate/view')
					->set('class_path', $class_path.$class_name.'_'.ucfirst($action));
				file_put_contents($view_path.DIRECTORY_SEPARATOR.$action.'.php', $view->render());
			}
	
			if ( ! file_exists($template_path.DIRECTORY_SEPARATOR.$action.'.mustache'))
			{
				$template = Kostache::factory('minion/task/app/scaffold/generate/template')
					->set('class_path', $class_path.$class_name.'_'.ucfirst($action));
				file_put_contents($template_path.DIRECTORY_SEPARATOR.$action.'.mustache', $template->render());
			}
		}
	}
}