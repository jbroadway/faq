<?php

/**
 * Update the sorting order of the faq list.
 */

$this->require_admin ();

$page->layout = false;

if (! faq\Faq::batch (function () {
	//error_log (json_encode ($_POST));
	$c = count ($_POST['list']);
	for ($i = 0; $i < $c; $i++) {
		if (! DB::execute (
			'update #prefix#faq set sort = ?, category = ? where id = ?',
			$i + 1,
			$_POST['category'],
			$_POST['list'][$i]
		)) {
			return false;
		}
	}
	return true;
})) {
	error_log (faq\Faq::$batch_error);
	exit;
}

?>