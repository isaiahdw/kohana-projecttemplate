<?php

class Model_One extends ORM
{
	protected $_has_one = array(
		'three' => array(),
	);

	protected $_load_with = array('three');
}
