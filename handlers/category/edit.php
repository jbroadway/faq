<?php

$page->layout = false;

if (! User::require_acl ('admin', 'faq')) {
	$this->add_notification (__ ('Please log in again to edit.'));
	echo $this->error (403, 'Forbidden');
	return;
}

if (! isset ($_POST['value'])) {
	$this->add_notification (__ ('Unable to save changes.'));
	echo $this->error (500, 'Missing parameter');
	return;
}

// fetch category object
$c = new faq\Category ($_POST['id']);
if ($c->error) {
	$this->add_notification (__ ('Unable to save changes.'));
	echo $this->error (500, 'Category not found');
	return;
}

// save the new value
$c->name = $_POST['value'];
if (! $c->put ()) {
	$this->add_notification (__ ('Unable to save changes.'));
	echo $this->error (500, 'Unknown error: ' . $c->error);
	return;
}

// respond if successful
$this->add_notification (__ ('Category saved.'));
echo Template::sanitize ($_POST['value']);

?>