<?php

if (! $this->internal) {
	$page->title = 'FAQ';
}

$list = faq\Faq::query ()
	->order ('id', 'asc')
	->fetch_orig ();

echo $tpl->render ('faq/index', array ('list' => $list));

?>