<?php defined('SYSPATH') or die('No direct script access.');

class View_Main_Yform extends View_Website
{
	public $values;

	public function form()
	{
		$yf = YForm::factory()
			->add_values((array)$this->values)
			->add_messages('errors', array
			(
				'checkboxes' => 'some error',
				'radios' => 'another error',
			));

		return array
		(
			array('element' => $yf->open()),
			array('element' => $yf->text('text')),
			array('element' => $yf->checkboxGroup('checkboxes')
				->add_options(array('one' => 'hello', 'two' => 'world'))),
			
			array('element' => $yf->radioGroup('radios')
				->add_options(array('one' => 'hello', 'two' => 'world'))),
			array('element' => $yf->submit('submit')),
			array('element' => $yf->close()),
		);
	}
}
