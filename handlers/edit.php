<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Edit question');

$form = new Form ('post', $this);

$this->run ('admin/util/wysiwyg', array ('field_id' => 'webpage-body'));

$form->data = new faq\Faq ($_GET['id']);

echo $form->handle (function ($form) {
	// Update the faq
	$faq = $form->data;
	$faq->question = $_POST['question'];
	$faq->answer = $_POST['answer'];
	$faq->put ();

	if ($faq->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to save question.'));
		return false;
	}

	// Save a version of the faq
	Versions::add ($faq);

	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('Question saved.'));
	$form->controller->redirect ('/faq/admin');
});

?>