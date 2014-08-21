<?php

if (! $this->internal) {
	$page->id = 'faq';
	$page->title = Appconf::faq ('FAQ', 'title');
	$page->layout = Appconf::faq ('FAQ', 'layout');
}

$all = faq\Faq::all ();

echo $tpl->render (
	'faq/index',
	array (
		'all' => $all,
		'links' => isset ($data['links']) ? $data['links'] : 'yes'
	)
);

?>