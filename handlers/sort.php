<?php

/**
 * Update the sorting order of the faq list.
 */

$this->require_admin ();

$page->layout = false;

if (! faq\Faq::batch (function () {
	error_log (serialize ($_POST['list']));
	$c = count ($_POST['list']);
	for ($i = 0; $i < $c; $i++) {
		if (! DB::execute (
			'update faq set sort = ? where id = ?',
			$i + 1,
			$_POST['list'][$i]
		)) {
			error_log (($i + 1) . ' ' . $_POST['list'][$i]);
			return false;
		}
	}
	return true;
})) {
	error_log (DB::$batch_error);
	exit;
}

?>