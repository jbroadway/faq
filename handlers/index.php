<?php

if (! $this->internal) {
	$page->id = 'faq';
	$page->title = Appconf::faq ('FAQ', 'title');
}

$list = faq\Faq::query ()
	->order ('sort', 'asc')
	->fetch_orig ();

echo $tpl->render (
	'faq/index',
	array (
		'list' => $list,
		'links' => isset ($data['links']) ? $data['links'] : 'yes'
	)
);

?>