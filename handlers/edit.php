<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Edit question');

$form = new Form ('post', $this);

$this->run ('admin/util/wysiwyg', array ('field_id' => 'webpage-body'));

$faq = new faq\Faq ($_GET['id']);
$form->data = $faq->orig ();
$form->data->categories = faq\Category::query ()->order ('name', 'asc')->fetch_assoc ('id', 'name');

echo $form->handle (function ($form) use ($faq) {
	// Update the faq
	$faq->question = $_POST['question'];
	$faq->answer = $_POST['answer'];
	$faq->category = $_POST['category'];
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