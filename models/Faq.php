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
	
	public static function all () {
		return array_merge (
			self::query ('*, 0 as category_id')
				->where ('category', 0)
				->order ('sort', 'asc')
				->fetch_orig (),
			self::query ('f.*, c.id as category_id, c.name as category_name')
				->from ('#prefix#faq f, #prefix#faq_category c')
				->where ('f.category = c.id')
				->order ('c.name', 'asc')
				->order ('f.sort', 'asc')
				->fetch_orig ()
		);
	}
	
	public static function by_category ($category) {
		
	}
}

?>