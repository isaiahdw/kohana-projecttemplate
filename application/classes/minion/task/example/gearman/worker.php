<?php defined('SYSPATH') or die('No direct script access.');

class Minion_Task_Example_Gearman_Worker extends Minion_Task {

	public function execute(array $config)
	{
		$worker = new GearmanWorker();

		// Connect to the localhost server
		$worker->addServer();
		// Tell the server you can perform this job
		$worker->addFunction('example_job', array($this, 'example_job'));

		Minion_CLI::write('Waiting for job...');
		// Wait for a job
		while ($worker->work()) {}
	}

	public function example_job($job)
	{
		// These things are just written to the terminal
		Minion_CLI::write('Received job: '.$job->handle());
		Minion_CLI::write('Result: 5');

		// This is communicated back to the gearman client
		return json_encode(array('hello'));
	}
}