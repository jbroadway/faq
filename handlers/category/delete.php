<?php

$this->require_admin ();

$c = new faq\Category;
$c->remove ($_POST['id']);

if ($c->error) {
	$this->add_notification (i18n_get ('Unable to delete category.'));
	$this->redirect ('/faq/admin');
}

// move questions to top-level
DB::execute (
	'update #prefix#faq set category = 0 where category = ?',
	$_POST['id']
);

$this->add_notification (i18n_get ('Category deleted.'));
$this->redirect ('/faq/admin');

?>