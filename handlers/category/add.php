<?php

$page->title = __ ('Add category');
$page->layout = 'admin';

$this->require_acl ('admin', 'faq');

$form = new Form ('post', $this);

echo $form->handle (function ($form) {
	$c = new faq\Category (array (
		'name' => $_POST['name']
	));
	if (! $c->put ()) {
		$form->controller->add_notification (__ ('Unable to save category.'));
		return false;
	}
	
	$form->controller->add_notification (__ ('Category added.'));
	$form->controller->redirect ('/faq/admin');
});

?>