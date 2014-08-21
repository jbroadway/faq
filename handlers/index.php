<?php

if (! $this->internal) {
	$page->id = 'faq';
	$page->title = Appconf::faq ('FAQ', 'title');
	$page->layout = Appconf::faq ('FAQ', 'layout');
}

if (isset ($data['category']) && ! empty ($data['category'])) {
	$all = faq\Faq::query ()
		->where ('category', $data['category'])
		->order ('sort', 'asc')
		->fetch_orig ();
	
	echo $tpl->render (
		'faq/category',
		array (
			'all' => $all,
			'links' => isset ($data['links']) ? $data['links'] : 'yes'
		)
	);
} else {
	$all = faq\Faq::all ();

	echo $tpl->render (
		'faq/index',
		array (
			'all' => $all,
			'links' => isset ($data['links']) ? $data['links'] : 'yes'
		)
	);
}

?>