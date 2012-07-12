<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('FAQ');

// Calculate the offset
$limit = 20;
$num = isset ($this->params[0]) ? $this->params[0] : 1;
$offset = ($num - 1) * $limit;

// Fetch the items and total items
$items = faq\Faq::query ()->fetch ($limit, $offset);
$total = faq\Faq::query ()->count ();

// Pass our data to the view template
echo $tpl->render (
	'faq/admin',
	array (
		'limit' => $limit,
		'total' => $total,
		'items' => $items,
		'count' => count ($items),
		'url' => '/faq/admin/%d'
	)
);

?>