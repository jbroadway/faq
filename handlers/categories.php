<?php

$list = faq\Category::query ()
	->order ('name', 'asc')
	->fetch_orig ();

echo $tpl->render (
	'faq/categories',
	array (
		'list' => $list
	)
);

?>