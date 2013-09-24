<?php

$list = faq\Faq::query ('id, question')
	->order ('sort', 'asc')
	->fetch_orig ();

echo $tpl->render (
	'faq/links',
	array (
		'list' => $list
	)
);

?>