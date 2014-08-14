<?php

if (! $this->internal) {
	$page->id = 'faq';
	$page->title = Appconf::faq ('FAQ', 'title');
	$page->layout = Appconf::faq ('FAQ', 'layout');
}

$list = faq\Faq::all ();

echo $tpl->render (
	'faq/index',
	array (
		'list' => $list,
		'links' => isset ($data['links']) ? $data['links'] : 'yes'
	)
);

?>