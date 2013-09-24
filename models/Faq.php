<?php

namespace faq;

class Faq extends \Model {
	public $table = '#prefix#faq';
	
	public static function next_num () {
		$res = \DB::shift ('select sort + 1 from #prefix#faq order by sort desc limit 1');
		if (! $res) {
			return 1;
		}
		return $res;
	}
	
	public static function yes_no () {
		return array (
			(object) array ('key' => 'no', 'value' => __ ('No')),
			(object) array ('key' => 'yes', 'value' => __ ('Yes')),
		);
	}
}

?>