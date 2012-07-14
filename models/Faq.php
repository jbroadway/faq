<?php

namespace faq;

class Faq extends \Model {
	public $table = 'faq';
	
	public static function next_num () {
		$res = \DB::shift ('select sort + 1 from faq order by sort desc limit 1');
		if (! $res) {
			return 1;
		}
		return $res;
	}
}

?>