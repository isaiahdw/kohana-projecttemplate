<?php defined('SYSPATH') or die('No direct script access.');

class View_Main_Yform extends View_Website
{
	public $values;

	public function form()
	{
		$yf = YForm::factory()
			->add_values((array)$this->values);

		return array
		(
			array('element' => $yf->open()),
			array('element' => $yf->text('text')),
			array('element' => $yf->submit('submit')),
			array('element' => $yf->close()),
		);
	}
}
