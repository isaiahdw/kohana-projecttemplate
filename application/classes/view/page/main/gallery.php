<?php defined('SYSPATH') or die('No direct script access.');

class View_Page_Main_Gallery extends Abstract_View_Page {

	public function images()
	{
		$files = Arr::flatten(Kohana::list_files('media/gallery'));
		$data = array();

		foreach ($files as $path)
		{
			// Get filepath starting after /media/
			$position = strrpos($path, '/media/');
			$file = (substr($path, $position + 7));
			$data[] = array(
				'url' => Media::url($file),
			);
		}

		return $data;
	}
}