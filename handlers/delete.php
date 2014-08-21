<?php

$this->require_admin ();

$faq = new faq\Faq;
$faq->remove ($_POST['id']);

if ($faq->error) {
	$this->add_notification (i18n_get ('Unable to delete question.'));
	$this->redirect ('/faq/admin');
}

$this->add_notification (i18n_get ('Question deleted.'));
$this->redirect ('/faq/admin');

?>