<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('FAQ');

// Fetch the items
$items = faq\Faq::all ();

// Add sortable from jQuery UI
$page->add_style ('/js/jquery-ui/jquery-ui.css');
$page->add_script ('/js/jquery-ui/jquery-ui.min.js');

// Pass our data to the view template
echo $tpl->render (
	'faq/admin',
	array (
		'count' => count ($items),
		'items' => $items
	)
);

?>